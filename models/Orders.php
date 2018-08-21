<?php

namespace app\models;

use Yii;
use app\models\Ostrings;
/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $name
 * @property string $lname
 * @property string $phone
 * @property string $email
 * @property string $city
 * @property string $addr
 * @property string $comments
 * @property string $processflag
 * @property string $date
 *
 * @property Ostrings[] $ostrings
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'lname', 'email', 'city', 'addr', 'comments', 'processflag'], 'safe'],
            [['name', 'city', 'addr', 'phone', 'processflag'], 'required'],
            [['name', 'lname', 'email', 'addr', 'comments'], 'string', 'max' => 255],
            [['city', ], 'integer'],
            [['phone', 'processflag'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'lname' => 'Lname',
            'phone' => 'Phone',
            'email' => 'Email',
            'city' => 'City',
            'addr' => 'Addr',
            'comments' => 'Comments',
            'processflag' => 'Processflag',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOstrings()
    {
        return $this->hasMany(Ostrings::className(), ['oid' => 'id']);
    }

    public function getCityName()
    {
        return $this->hasOne(Cities::className(), ['peccityid' => 'city']);
    }

    /*
     * Все строчки в корзине которые привязаны к текущему
     * айди сессии сейчас нужно переписать в таблицу с ostring
     * затем очистить корзину.
     */
    public static function storeCartStinsInOrderString($oid)
    {
        $ssid = (new \yii\web\session)->id;

        $strings = Carts::find()
            ->where(['ssid' => $ssid])
            ->all();

        foreach($strings as $string) {
            $ostring = new Ostrings;
            $ostring->oid = $oid;
            $ostring->iid = $string->iid;
            $ostring->amount = $string->amount;
            $ostring->save();
        }
    }

    public static function clearCart()
    {
        $ssid = (new \yii\web\session)->id;
        Carts::deleteAll(['ssid'=>$ssid]);
    }

}
