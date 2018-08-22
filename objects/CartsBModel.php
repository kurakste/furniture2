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

    /*
     * Параметры придут пост запростом.
     *
     * @param integer $data['iid'] - идентификатор товара.
     * @param integer $data['cid'] - идентификатор цвета.
     * @param integer $data['fid'] - идентификатор фактуры.
     * @param real $data['amount'] - кол-во.
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
    public function addStrings($data) 
    {
        $ssid = self::getCartId();
        $data['ssid'] = $ssid;
        // Сначала смотрим есть ли у пользователя с текущий ssid
        // в корзине товар с данным iid + cid + fid. Если есть будем извлекать 
        // извлекать эту строку корзины и увеличивать кол-во
        // если нет, то просто добавим строку. Если записей для
        // текущего ssid еще нет, то тоже просто добовляем строку
        // в базу данных. 

        $strings = Carts::find()
            ->where(['ssid' => $data['ssid']])
            ->all();
        $cart = [];
        foreach ($strings as $string) {
            if (
                ($string->iid == (int)($data['iid'] ?? 0)) &&
                ($string->cid == (int)($data['cid'] ?? 0)) &&
                ($string->fid == (int)($data['fid'] ?? 0)) 
                                                    ) {
                $string->amount = $string->amount + $data['amount'];
                $string->save();
                return; // Товар уникальный для корзины. Если встретили - второго не будет.
            }
        }
        // Если мы здесь, то значит в корзине до этого товара с таким  iid небыло
        // нужно добавлять. 
        $newcartstring = new Carts;

        $newcartstring->attributes = $data;
        // проверяем что бы все атрибуты были присвоенны.
        if ($newcartstring->validate()) {
            $newcartstring->save();
            return;

        } else {
            // проверка не удалась:  $errors - это массив содержащий сообщения об ошибках
            $out = $newcartstring->errors;
            throw new \yii\web\ServerErrorHttpException($out);
        }
    
    }
}
