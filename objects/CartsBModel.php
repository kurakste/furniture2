<?php

namespace app\objects;

use app\models\Carts;

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
}
