<?php

/* @var $this yii\web\View */

$this->title = 'Каталог'; ?>


<div class="products-catagories-area clearfix">
 <div class="amado-pro-catagory clearfix">
    <?php foreach ($items as $item) : ?>
    
     <div class="single-products-catagory clearfix">
     <a href="/catalog?cid=<?= $item->id?>">
     <img src="/img/<?= $item->image; ?>" alt="chair">
             <div class="hover-content">
                 <div class="line"></div>
                 <h4><?= $item->name ?></h4>
             </div>
         </a>
     </div>
<?php endforeach ?>
 </div>
</div>

