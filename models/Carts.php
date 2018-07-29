<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carts".
 *
 * @property int $id
 * @property string $ssid Идентификатор сессии
 * @property int $iid Идентификатор товара
 * @property int $amount Кол-во заказанного товара.
 * @property string $created_at Время создания записи
 *
 * @property Items $i
 */
class Carts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iid', 'amount'], 'integer'],
            [['created_at'], 'safe'],
            [['ssid'], 'string', 'max' => 256],
            [['iid'], 'exist', 'skipOnError' => true, 'targetClass' => Items::className(), 'targetAttribute' => ['iid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ssid' => 'Идентификатор сессии',
            'iid' => 'Идентификатор товара',
            'amount' => 'Кол-во заказанного товара.',
            'created_at' => 'Время создания записи',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Items::className(), ['id' => 'iid']);
    }

    public static function getAmountOfItems($ssid)
    {
        $count = self::find()->where(['ssid'=>$ssid])->count();
        return $count;
    }
    
    public static function getSummtOfCart($ssid)
    {
        $summ = \Yii::$app->db->createCommand
            (
                "SELECT SUM(amount*price) as cartSum FROM carts LEFT JOIN items 
                ON carts.iid = items.id WHERE carts.ssid = :ssid;",
                [':ssid' => $ssid ]
            )->query();
        $out = $summ->readAll()[0]['cartSum'] ?? null; 
        return $out;
    }
}
