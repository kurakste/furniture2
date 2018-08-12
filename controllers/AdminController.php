<?php

namespace app\controllers;

class AdminController extends \yii\web\Controller
{
    public $layout = 'adminlte';

    public function actionIndex()
    {
        return $this->render('index');
    }

}
