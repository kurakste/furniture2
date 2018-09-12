<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Items', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description',
            'cid',
            'mainimageid',
            'price',
            'length',
            'width',
            'height',
            'volume',
            'weight',

            ['class' => 'yii\grid\ActionColumn'],
            [
                'format' => 'html',
                'value' => function($model) {
                    if ($model->isFavorite()) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-star">',
                            Url::to(['site/ajax-remove-favorite', 'iid' => $model->id])
                        );
                    
                    } else {
                        return Html::a(
                            '<span class="glyphicon glyphicon-star-empty">',
                            Url::to(['site/ajax-add-favorite', 'iid' => $model->id])
                        );
                    }
                }
            ]
        ],
    ]); ?>
</div>
