<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "items".
 *
 * @property int $id
 * @property string $name Наименование
 * @property string $description Описание
 * @property int $cid Индекс категории
 * @property int $mainimageid Индекс главного изображения
 * @property double $price Цена
 * @property double $length Длина в упаковке.
 * @property double $width Ширина в упаковке.
 * @property double $height Высота в упаковке.
 * @property double $volume Объем упаковки.
 * @property double $weight Вес с упаковкой.
 *
 * @property Carts[] $carts
 * @property Images[] $images
 * @property Categorys $c
 * @property Ostrings[] $ostrings
 */
class Items extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cid'], 'required'],
            [['cid', 'mainimageid'], 'integer'],
            [['price', 'length', 'width', 'height', 'volume', 'weight'], 'number'],
            [['name'], 'string', 'max' => 125],
            [['description'], 'string', 'max' => 255],
            [['cid'], 'exist', 'skipOnError' => true, 'targetClass' => Categorys::className(), 'targetAttribute' => ['cid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'description' => 'Описание',
            'cid' => 'Индекс категории',
            'mainimageid' => 'Индекс главного изображения',
            'price' => 'Цена',
            'length' => 'Длина в упаковке.',
            'width' => 'Ширина в упаковке.',
            'height' => 'Высота в упаковке.',
            'volume' => 'Объем упаковки.',
            'weight' => 'Вес с упаковкой.',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Carts::className(), ['iid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Images::className(), ['iid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(Categorys::className(), ['id' => 'cid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOstrings()
    {
        return $this->hasMany(Ostrings::className(), ['iid' => 'id']);
    }
}
