<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Items */
?>

<style>
   #item-wrapper {
      width: 70%;
   }

   .iimage {
      width: 40%;
      float: left;
   }

   #idescription {

   }

   #isubmit {
      margin: 10px;
      width: 150px;
   }


</style>

<div id='item-wrapper'>
    <img class ='iimage' src="/img/<?= $item->getMainImage() ?>" alt="" />
      <div id = 'idescription'>
      <h4> <?= $item->name ?> </h4>
      <h6> <?= $item->description ?> </h6>
      <p> Цена: <?= $item->price ?> </p>
</div>

   <form action="/cart/add-string-to-cart" method="post">
   <input type="hidden" name="iid" value=" <?= $item->id ?>" />
   <input type="hidden" name="cid" value=" 2 " />
   <input type="hidden" name="fid" value=" 2" />
      <input type="text" name="amount" value="1" />
      <input type="submit" name="" id="isubmit" value="в корзину" />
   </form>

   <a href="/">В КАТАЛОГ</a>
</div>

