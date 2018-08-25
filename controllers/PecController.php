<?php

namespace app\controllers;

use app\objects\PecDelivery;
use app\objects\CartsBModel;

class PecController extends \yii\web\Controller
{
    public function actionIndex()
    {
        echo 'hi!'; die;
        return $this->render('index');
    }

    /**
     * @param string pattern;
     * @return ajax response array
     *
     * Gets pattern from POST request and returns
     * cities with code.
     *
     */  
    public function actionAjaxGetCities ($q=null, $id= null)
    {
        $citylist = (new PecDelivery)->getCitylist($q, $id);

        /* var_dump($citylist); */
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        return $citylist; 
    
    }

    /**
     * POST params:
     * @param float width 
     * @param float length
     * @param float height
     * @param float volume
     * @param float weight
     * @param integer town 
     *
     * @return ajax response int
     *
     * Calculate cost of delivery with PEC delivery
     * service.
     * Данные о размере товара, которые лежи
     * в корзине предоставляет корзина в виде
     * массива.
     *
     *
     */  
    public function actionAjaxGetDeliveryCost()
    {
        $params = (\Yii::$app->request);
        $town = (int)$params->post('town');
        $tohome = (bool)$params->post('tohome');
        $data = (new CartsBModel)->getCartsSizeVolumeAndWeight();
        $data ['town'] = $town;         

        $pec = new PecDelivery;
        $pec->attributes = $data;
        
        $delivery = $pec->calcDeliveryCost($tohome);

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return $delivery;
    }

}
