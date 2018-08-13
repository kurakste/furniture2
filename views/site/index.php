<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application'; ?>



     <div class="products-catagories-area clearfix">
         <div class="amado-pro-catagory clearfix">
            <?php foreach ($items as $item) : ?>
            
             <div class="single-products-catagory clearfix">
             <a href="/items/showitem?id=<?= $item->id ?>">
             <img src="/img/<?= $item->getMainImage(); ?>" alt="chair">
                     <div class="hover-content">
                         <div class="line"></div>
                         <p>От <?= $item->price ?></p>
                         <h4><?= $item->name ?></h4>
                     </div>
                 </a>
             </div>
        <?php endforeach ?>
         </div>
     </div>
