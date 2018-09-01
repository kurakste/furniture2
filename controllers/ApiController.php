<?php

namespace app\controllers;

use \app\models\Items;

class ApiController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public static function allowedDomains()
    {
        return [
             '*',                        // star allows all domains
            /* 'http://test1.example.com', */
            /* 'http://test2.example.com', */
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [

            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    // restrict access to domains:
                    'Origin'                           => static::allowedDomains(),
                    'Access-Control-Request-Method'    => ['GET'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)
                ],
            ],

        ]);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetCatalogByCid()
    {
        $cid = (int)(\Yii::$app->request)->get('cid');
        $cat = Items::find()->where(['cid' => $cid])->all();
        
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSONP;
        $callback = 'myFunction';
        return ['callback' => $callback, 'data' => $cat ];
    }

}
