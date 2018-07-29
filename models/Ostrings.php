<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ostrings".
 *
 * @property int $id Индекс
 * @property int $oid Индекс заказа
 * @property string $name Наименование
 * @property double $price Цена
 * @property int $amount кол-во
 *
 * @property Orders $o
 */
class Ostrings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ostrings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['oid', 'amount'], 'integer'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 125],
            [['oid'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['oid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Индекс',
            'oid' => 'Индекс заказа',
            'name' => 'Наименование',
            'price' => 'Цена',
            'amount' => 'кол-во',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['id' => 'oid']);
    }
}
