
<?php

use yii\helpers\Html;

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-index" style = "width: 1000px; overflow-y: scroll">

    <h1><?= Html::encode($this->title) ?></h1>
    <h3>
        <a href="/files/upload">Загрузить</a>
    </h3>
    <ul>
    <?php foreach ($files as $file) : ?>
    <li>
        <?= $file ?>
        <button class = "file-delete-button" 
                value ="<?= $file ?>">
                <i class="fas fa-trash-alt" aria-hidden="true"></i>
        </button>
        <button class = "file-rename-button" value ="
                <?= $file ?>">
                <i class="fas fa-pencil-alt" aria-hidden="true"></i>
        </button> </li>
    <?php endforeach ?>
    </ul>
        
</div>
