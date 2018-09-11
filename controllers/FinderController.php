<?php

namespace app\controllers;

class FinderController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout = 'adminlte';
        return $this->render('index');
    }

}
