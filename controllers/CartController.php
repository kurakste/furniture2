<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use app\models\Carts;
use app\objects\CartsBModel;

class CartController extends \yii\web\Controller
{
    public function actionIndex()
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
        $data = \Yii::$app->request->post();
        $cart = new CartsBModel;
        $cart->addStrings($data);

        return $this->redirect('/'); 
    }

    public function actionClearCart()
    {
        $ssid = CartsBModel::getCartId();
        $cartstrings = Carts::deleteAll(['ssid'=>$ssid]);
    }

    /*
     * Gets all data about carts items from frontend as Json.
     * Validate data and if all data is valid for Carts model, its 
     * clear old carts data and strore new one.
     * If data validation will return false - throw HttpExeption
     * @param string params;
     * @throw HttpExeption;
     */
    public function actionJasonApiStore()
    {
        $data = \Yii::$app->request->post('cartstrings');
        $cartstrings = json_decode($data);
        (new CartsBModel)->loadCartAsArray($cartstrings);

        Yii::$app->response->format = Response::FORMAT_JSON;
        return;
    
    }

    public function actionGetCartJson()
    {
        $out = (new CartsBModel)->getCartAsArray();

        Yii::$app->response->format = Response::FORMAT_JSON;
        return $out;
    }
    
    public function actionGetCart()
    {
        $ssid = CartsBModel::getCartId();

        $carts = Carts::findAll(['ssid'=>$ssid]);

        /* var_dump($carts[0]->facture);die; */


        return $this->render('showitems', ['carts' => $carts ]);
    }

    public function actionTest()
    {
        $i =(new CartsBModel)->getCartsSizeVolumeAndWeight(); 
        var_dump($i);
    }


}
