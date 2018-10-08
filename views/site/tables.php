
<?php

use dastanaron\translit\Translit;

$this->title = ''; 
?>

<div class="products-catagories-area clearfix">
    <div class="amado-pro-catagory clearfix">

        <?php foreach ($items as $item): ?>

         <?php 
            $translit = new Translit();
            $seo = $item->c->name.' / ';
        ?>

        <div class="single-products-catagory clearfix">
            <a href="/items/showitem?id=<?= $item->id ?>">
            <img src="<?= $item->getMainImage() ?>" alt="<?= $seo.$item->name ?>" title="<?= $seo.$item->name ?>">
                <div class="hover-content">
                    <div class="line"></div>
                    <p>&#8381 <?= number_format($item->price, 2, '.', ' ') ?></p>
                    <h4><?= $item->name ?></h4>
                </div>
            </a>
        </div>
        <?php endforeach ?>

    </div>
</div>
