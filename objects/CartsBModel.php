<?php

namespace app\objects;

use app\models\Carts;
use yii\web\Cookie;

class CartsBModel 
{
    /*
     *  Возвращает кол-во элементов в карзине 
     *  текущего польователя. 
     * @return int
     */
    public static function getAmountItemsInCart(): int
    {
        $ssid = (new \yii\web\session)->id;
        $count = Carts::find()->where(['ssid'=>$ssid])->count();

        return $count;
    }  

    /*
     * Функция возвращает и если надо то
     * создает  id сессии-козины. Для этого он
     * проверяет в куках переменную ssid и если 
     * ее нет, стартует сессию и ее айди сохраняет в
     * куках. Срок хранения этой переменной 30 дней.
     *
     *  @return string ssid
     */
    public static function getCartId(): string
    {
        $cookies = \Yii::$app->request->cookies;
        

        if (!$cookies->has('ssid')) {
            $session = \Yii::$app->session;
            if  (!$session->isActive) $session->open();
            $ssid = \Yii::$app->session->getId();
            $cookie = new Cookie([
                    'name' => 'ssid',
                    'value' => $ssid,
                    'expire' => time() + 86400 * 30,
                ]);
            $cookies = \Yii::$app->response->cookies;
            $cookies->add($cookie);
        } else {
            $ssid = $cookies->get('ssid');
        }

        return $ssid;
    }
}
