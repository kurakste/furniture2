<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use app\models\Carts;

class CartController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        return $this->render('index');
    }


    /*
     * Параметры придут пост запростом.
     *
     * @param integer $iid - идентификатор товара.
     * @param integer $cid - идентификатор цвета.
     * @param integer $fid - идентификатор фактуры.
     *
     * Добавляет новую запись в корзину. 
     * Ключом будет адйди сессии. 
     * Нужно продумать алгоритм сборки мусора 
     * в этой таблице. Предварительно мы можем
     * анализировать дауту создания и раз в день 
     * чиститить записи старше определенного кол-ва дней.
     * Этот промежуток времени должен быть связан с 
     * временем жизни сессии в приложении.
     */
    public function actionAddStringToCart()
    {
        $request = \Yii::$app->request->post();
        $ssid = (new \yii\web\session)->id;
        $request['ssid'] = $ssid;

        // Сначала смотрим есть ли у пользователя с текущий ssid
        // в корзине товар с данным iid + cid + fid. Если есть будем извлекать 
        // извлекать эту строку корзины и увеличивать кол-во
        // если нет, то просто добавим строку. Если записей для
        // текущего ssid еще нет, то тоже просто добовляем строку
        // в базу данных. 
        $strings = Carts::find()
            ->where(['ssid' => $request['ssid']])
            ->all();
        $cart = [];
        foreach ($strings as $string) {
            if (
                ($string->iid == $request['iid']) &&
                ($string->cid == $request['cid']) &&
                ($string->fid == $request['fid']) 
                                                    ) {
                $string->amount = $string->amount + $request['amount'];
                $string->save();
                $this->redirect('/');
                return; // Товар уникальный для корзины. Если встретили - второго не будет.
            }
        }
        // Если мы здесь, то значит в корзине до этого товара с таким  iid небыло
        // нужно добавлять. 
        $newcartstring = new Carts;

        $newcartstring->attributes = $request;
        // проверяем что бы все атрибуты были присвоенны.
        if ($newcartstring->validate()) {
            $newcartstring->save();
            $out = null;
            $this->redirect('/');
            return;

        } else {
            // проверка не удалась:  $errors - это массив содержащий сообщения об ошибках
            $out = $newcartstring->errors;
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $out;
        }
        
    }

    public function actionClearCart()
    {
        $ssid = (new \yii\web\session)->id;
        $cartstrings = Carts::deleteAll(['ssid'=>$ssid]);
    }

    public function actionGetCartJson()
    {
        $ssid = (new \yii\web\session)->id;
        $carts = Carts::findAll(['ssid'=>$ssid]);
        $out = [];
        $tmp =[];
        foreach ($carts as $cart) {
            $tmp['name'] = $cart->item->name; 
            $tmp['amount'] = $cart->amount; 
            $tmp['price'] = $cart->item->price; 
            $out[] = $tmp;
        }


        Yii::$app->response->format = Response::FORMAT_JSON;
        return $out;
    }
    
    public function actionGetCart()
    {
        $ssid = (new \yii\web\session)->id;
        $carts = Carts::findAll(['ssid'=>$ssid]);


        return $this->render('showitems', ['cart' => $carts ]);
    }

    public function actionTest()
    {
        $carts = [];
       $ssid = (new \yii\web\session)->id;
       $summ = Carts::getSummtOfCart($ssid);
        return $this->render('showitems', ['cart' => $carts ]);
    }

}
