
<?php

use yii\helpers\Html;

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-index" style = "width: 1000px; overflow-y: scroll">

    <h1><?= Html::encode($this->title) ?></h1>
    <ul>
    <?php foreach ($files as $file) : ?>
    <li><?= $file ?></li>
    <?php endforeach ?>
    </ul>
        
</div>
