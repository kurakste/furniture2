
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
        <?php $formId =0; ?> 
        <?php foreach ($files as $file) : ?>
            <?php $formId++ ?>
            <li>
                <!-- <?= $file ?>  -->
                <form action="files/rename" method="post" id ='save_<?= $formId ?>'>
                    <input type="hidden" name="oldname" id="" value="<?= $file ?>" />
                    <input type="tetx" name="newname" id="" value="<?= $file ?>" />
                </form>
                <form action="files/delete" method="post" id ='delete_<?= $formId ?>'>
                    <input type="hidden" name="filename" id="filename" value="<?= $file ?>" />
                </form>
                <button class = "file-delete-button" 
                        type ="submit" 
                        form ="delete_<?= $formId ?>" >
                        <i class="fas fa-trash-alt" aria-hidden="true"></i>
                </button>
                <button class = "file-save-button" 
                        type ="submit" 
                        form ="save_<?= $formId ?>" >
                        <i class="fas fa-save" aria-hidden="true"></i>

                </button> 
            </li>
        <?php endforeach ?>
    </ul>
</div>
