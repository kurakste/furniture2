<?php

namespace app\controllers;

use yii\filters\VerbFilter;

class AddtocartController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['post', 'get' ],
                ],
            ],
        ];
    }

    /*
     * Параметры придут пост запростом.
     *
     * @param integer $iid - идентификатор товара.
     * @param integer $cid - идентификатор цвета.
     * @param integer $fid - идентификатор фактуры.
     *
     * @return 
     *
     * Добавляет новую в таблицу в корзины.
     * Ключом будет id сессии. 
     *
     */  
    public function actionIndex()
    {
        $request = \Yii::$app->request->get();
        
        $ssid = \Yii::$app->session->getId(); 
        $request['ssid'] = $ssid;

        var_dump($request); die; 

        return $this->render('index');
    }

}
