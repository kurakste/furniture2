<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Items */

$this->registerJsFile('/js/showitem.js', [
        'depends' => [\yii\web\JqueryAsset::className()] 
    ]);
?>
<div class="single-product-area section-padding-100 clearfix" 
        id='page1' style='display:block;'>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-50">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $item->name ?></li>
                    </ol>
                </nav>
            </div>
        </div> <!-- row -->
        <div class="row">
            <div class="col-12 col-lg-7">
                <div class="single_product_thumb">
                    <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php $aa = 0; ?>
                            <?php foreach ($item->images as $image): ?>
                                <?php if($aa===0): ?>
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(/img/<?= $image->filename ?>);">
                                    </li>
                                <?php else: ?>
                                    <li data-target="#product_details_slider" data-slide-to="0" style="background-image: url(/img/<?= $image->filename ?>);">
                                    </li>
                                <?php endif ?>
                            <?php endforeach ?>
                        </ol>
                        <div class="carousel-inner">
                            <?php $ii = 0; ?>    
                            <?php foreach ($item->images as $image): ?>
                                <?php if ($ii ===0 ): ?>
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="/img/<?= $image->filename ?>">
                                            <img class="d-block w-100" src="/img/<?= $image->filename ?>" alt="First slide">
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="/img/<?= $image->filename ?>">
                                            <img class="d-block w-100" src="/img/<?= $image->filename ?>" alt="First slide">
                                        </a>
                                    </div>
                                <?php endif ?>
                                <?php $ii++ ?>
                                
                            <?php endforeach ?>
                        </div> <!-- carusel -->
                    </div> <!-- producte detail -->
                </div> <!-- single product .. -->
            </div> <!-- col12 -->
            <div class="col-12 col-lg-5">
                <div class="single_product_desc">
                    <!-- Product Meta Data -->
                    <div class="product-meta-data">
                        <div class="line"></div>
                        <p class="product-price"><?= number_format($item->price, 2, '.', ' ')?></p>
                        <a href="product-details.html">
                            <h6><?= $item->name ?></h6>
                        </a>
                
                        <div class="short_overview my-5"> 
                            <p><?= $item->description ?></p> 
                        </div>
                    </div>
                    <!-- Add to Cart Form -->
                    <form id='add-to-cart' class="cart clearfix" method="post" action='/cart/add-string-to-cart'>
                    <input type="hidden" name="iid" id="iid" value="<?= $item->id ?>" />
                        <div class="cart-btn d-flex mb-50">
                            <p>кол-во</p>
                            <div class="quantity">
                                <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="amount" value="1">
                                <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </form>
                    <?php if($item->cid ===1): ?>
                        <button id="go-to-colors-btn" name="addtocart" value="5" class="btn amado-btn">Перейти к выбору цвета</button>
                    <?php else: ?>
                        <script> 
                            var path_without_checkbpx = true;
                        </script>
                        <button form = 'add-to-cart' id="btn-add-to-cart" name="addtocart" value="5" class="btn amado-btn">Добавить в корзину.</button>
                    <?php endif ?>
                </div> <!-- single product desc-->
            </div> <!-- col12 -->
        </div> <!-- row -->
    </div> <!-- container fluid -->
</div>
<!-- ==== Этот блок нужен только если категория  === 1 - стулья& -->
    <?php if ($item->cid === 1): ?>
    <div class="single-product-area section-padding-100 clearfix"
        id='page2' style='display: none;'>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mt-50">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $item->name ?></li>
                        </ol>
                    </nav>
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-12 col-lg-7">
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                        <?php foreach ($colors as $color): ?>
                            <label>
                            <input form="add-to-cart" type="radio" name="cid" id="cid" required value="<?= $color->id ?>" />
                              <img class="imgClass" src="/img/material/<?= $color->img ?>">
                            </label>
                        <?php endforeach ?>
                        </div>
                    </div>
                </div> <!-- col 12 -->
    <!--- -->
                <div class="col-12 col-lg-5">
                    <div class="single_product_desc">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                            <p class="product-price"><?= number_format($item->price, 2, '.', ' ') ?></p>
                            <a href="product-details.html">
                                <h6><?= $item->name ?></h6>
                            </a>
                    
                            <div class="short_overview my-5"> 
                                <p><?= $item->description ?></p> 
                            </div>
                        </div>
                        <!-- Add to Cart Form -->
                        <button id="go-to-description" name="addtocart" value="5" class="btn amado-btn">Вернуться к описанию.</button>
                        <button id="go-to-facture-btn" name="addtocart" value="5" class="btn amado-btn">Перейти к выбору фактуры.</button>
                    </div> <!-- single product desc-->
                </div> <!-- col12 -->

    <!--- -->
            </div> <!-- row -->
        </div>
    </div>
    <div class="single-product-area section-padding-100 clearfix"
        id='page3' style='display: none;'>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mt-50">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $item->name ?></li>
                        </ol>
                    </nav>
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-12 col-lg-7">
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                        <?php foreach ($factures as $facture): ?>
                            <label>
                            <input  form="add-to-cart" type="radio" name="fid" id="fid" value="<?= $facture->id ?>" />
                              <img class="imgClass" src="/img/material/<?= $facture->img ?>">
                            </label>
                        <?php endforeach ?>
                        </div>
                    </div>
                </div> <!-- COL 12 -->
    <!--- -->
                <div class="col-12 col-lg-5">
                    <div class="single_product_desc">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                            <p class="product-price"><?= number_format($item->price, 2, '.', ' ') ?></p>
                            <a href="product-details.html">
                                <h6><?= $item->name ?></h6>
                            </a>
                    
                            <div class="short_overview my-5"> 
                                <p><?= $item->description ?></p> 
                            </div>
                        </div>
                        <!-- Add to Cart Form -->
                        <button id="back-to-color" name="addtocart" value="5" class="btn amado-btn">Выбор цвета.</button>
                        <button form = 'add-to-cart' id="btn-add-to-cart" name="addtocart" value="5" class="btn amado-btn">Добавить в корзину.</button>
                    </div> <!-- single product desc-->
                </div> <!-- col12 -->
    <!--- -->
            </div> <!-- ROW -->
        </div>
    </div>
<?php else: ?> 

<input form="add-to-cart" type="hidden" name="cid" id="cid" required value="13" />
<input form="add-to-cart" type="hidden" name="fid" id="fid" required value="20" />

<?php endif ?>
