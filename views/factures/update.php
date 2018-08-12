<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Factures */

$this->title = 'Update Factures: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Factures', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="factures-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
