<?php

namespace app\controllers;

class CatalogController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $cid = \Yii::$app->request->get('cid') ?? null;

        if (!$cid) {
            $items = \app\models\Categorys::find()->all();
            return $this->render('index', ['items' => $items]);
        } else {
            $items = \app\models\Items::find()->where(['cid'=>$cid])->all();
            return $this->render('catitems', ['items' => $items]);
        }
        
    }



}
