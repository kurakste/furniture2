<?php

namespace app\controllers;

use app\models\Carts;
use app\models\Orders;
use app\models\Ostrings;

class OrdersController extends \yii\web\Controller
{
    public function actionGetform()
    {
        $ssid = (new \yii\web\session)->id;
        $summ = Carts::getSummtOfCart($ssid);
        return $this->render('getform', ['summ' => $summ]);
    }

    public function actionStoreOrder()
    {
        $request = \Yii::$app->request->post();
        $ssid = (new \yii\web\session)->id;

        $order = new Orders;
        $request['processflag'] = 'new';
        $order->attributes = $request;

        if ($order->validate()) {
            $order->save();
            
            Orders::storeCartStinsInOrderString($order->id);
            Orders::clearCart();
            $out = null;
            $this->redirect('/');
            return;

        } else {
            // проверка не удалась:  $errors - это массив содержащий сообщения об ошибках
            $out = $newcartstring->errors;
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $out;
        }
       var_dump($request); 
        echo 'hi!'; 
    }

}
