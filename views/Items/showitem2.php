
<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Items */
?>
   
<!-- PAGE 2 -->
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
        </div>

        <div class="row">
            <div class="col-12 col-lg-7">
                <div class="single_product_thumb">
                    <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(/img/<?= $item->getMainImage() ?>);">
                            </li>
                            <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(img/product-img/pro-big-2.jpg);">
                            </li>
                            <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(img/product-img/pro-big-3.jpg);">
                            </li>
                            <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(img/product-img/pro-big-4.jpg);">
                            </li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a class="gallery_img" href="/img/<?= $item->getMainImage() ?>">
                                    <img class="d-block w-100" src="/img/<?= $item->getMainImage() ?>" alt="First slide">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="gallery_img" href="img/product-img/pro-big-2.jpg">
                                    <img class="d-block w-100" src="img/product-img/pro-big-2.jpg" alt="Second slide">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="gallery_img" href="img/product-img/pro-big-3.jpg">
                                    <img class="d-block w-100" src="img/product-img/pro-big-3.jpg" alt="Third slide">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="gallery_img" href="img/product-img/pro-big-4.jpg">
                                    <img class="d-block w-100" src="img/product-img/pro-big-4.jpg" alt="Fourth slide">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="single_product_desc">
                    <!-- Product Meta Data -->
                    <div class="product-meta-data">
                        <div class="line"></div>
                        <p class="product-price"><?= $item->price ?></p>
                        <a href="product-details.html">
                            <h6><?= $item->name ?></h6>
                        </a>
                    <div class="short_overview my-5">
                        <p><?= $item->description ?></p>
                    </div>

                    <!-- Add to Cart Form -->
                    <form class="cart clearfix" method="post">
                        <div class="cart-btn d-flex mb-50">
                            <p>Qty</p>
                            <div class="quantity">
                                <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <button type="submit" name="addtocart" value="5" class="btn amado-btn">Add to cart</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Details Area End -->
<!-- PAGE 2 -->
<div class="single-product-area section-padding-100 clearfix" 
        id='page2' style='display:none;'>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 col-lg-7">
                <div class="single_product_thumb">
                    <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/m1.jpg">
                        </label>
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/m2.jpg">
                        </label>
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/m3.jpg">
                        </label>
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/m4.jpg">
                        </label>
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/m5.jpg">
                        </label>
                         <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/m6.jpg">
                        </label>                               
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/m7.jpg">
                        </label>                               
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/m8.jpg">
                        </label>                               
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/m9.jpg">
                        </label>                               
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/m10.jpg">
                        </label>                               
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/m11.jpg">
                        </label>                               
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/m12.jpg">
                        </label>                               
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/m13.jpg">
                        </label>                      
                    </div>
                </div>
            </div>
     
        </div>
    </div>
</div>
<!-- PAGE 3 -->
<div class="single-product-area section-padding-100 clearfix"
            id=page3' style='display:none;'>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 col-lg-7">
                <div class="single_product_thumb">
                    <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/o1.jpg">
                        </label>
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/o2.jpg">
                        </label>
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/o3.jpg">
                        </label>
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/o4.jpg">
                        </label>
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/o5.jpg">
                        </label>
                         <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/o6.jpg">
                        </label>                               
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/o7.jpg">
                        </label>                               
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/o8.jpg">
                        </label>                               
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/o9.jpg">
                        </label>                               
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/o10.jpg">
                        </label>                               
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/o11.jpg">
                        </label>                               
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/o12.jpg">
                        </label>                               
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/o13.jpg">
                        </label>
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/o14.jpg">
                        </label>
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/o15.jpg">
                        </label>
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/o16.jpg">
                        </label>
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/o17.jpg">
                        </label>
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/o18.jpg">
                        </label>
                        <label>
                          <input type="radio" name="fb" value="small" />
                          <img class="imgClass" src="/img/material/o19.jpg">
                        </label>                      
                    </div>
                </div>
            </div>
     
        </div>
    </div>
</div>
<!-- Product Details Area End -->
</div>
