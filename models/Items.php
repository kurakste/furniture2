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
 * @property string $size Размер
 * @property int $mainimageid Индекс главного изображения
 * @property double $price Цена
 *
 * @property Cstrings[] $cstrings
 * @property Images[] $images
 * @property Categorys $c
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
            [['price'], 'number'],
            [['name'], 'string', 'max' => 125],
            [['description', 'size'], 'string', 'max' => 255],
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
            'size' => 'Размер',
            'mainimageid' => 'Индекс главного изображения',
            'price' => 'Цена',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCstrings()
    {
        return $this->hasMany(Cstrings::className(), ['iid' => 'id']);
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
    public function getCategory()
    {
        return $this->hasOne(Categorys::className(), ['id' => 'cid']);
    }

    public function getMainImage()
    {
        $out = \app\models\Images::findOne(['id' => $this->mainimageid]);

        return $out->filename;
    
    }
}
