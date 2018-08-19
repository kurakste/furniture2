<?php

namespace app\controllers;

use app\objects\PecDelivery;

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
     *
     *
     */  
    public function actionAjaxGetDeliveryCost()
    {
        $params = (\Yii::$app->request);
        /* var_dump($params->post());die; */ 
        $town = $params->post('town');
        $data = [
            'width' => 0.3,
            'length'=> 0.8,
            'height'=> 0.4,
            'volume'=> 0.096,
            'weight'=> 4,
            'town' => $town,         
        ];

        $pec = new PecDelivery;
        $pec->attributes = $data;
        
        $delivery = $pec->calcDeliveryCost();

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return $delivery;
    }

}
