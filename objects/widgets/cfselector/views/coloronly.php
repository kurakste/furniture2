<?php 

$this->registerJsFile('/js/showitem_coloronly.js', [
        'depends' => [\yii\web\JqueryAsset::className()] 
    ]);
?>

    <div class="single-product-area section-padding-100 clearfix"
        id='page2' style='display: none;'>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-7">
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                        <?php foreach ($colors as $color): ?>
                            <label>
                            <input form="add-to-cart" type="radio" name="cid" id="cid" required value="<?= $color->id ?>" />
                              <img class="imgClass" src="<?= $color->img ?>">
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
                        <input form="add-to-cart" type="hidden" name="fid" id="fid" required value="0" />
                        <button id="go-to-description" name="addtocart" value="5" class="btn amado-btn" size>Вернуться к описанию</button>
                        <button form = 'add-to-cart' id="btn-add-to-cart" name="addtocart" value="5" class="btn amado-btn">Добавить в корзину.</button>
                        <div id="warn-message-choose-color" style="display: none;">
                            <p class="messageAlert">Для перехода к следующему шагу,выбирите пожалуйста цвет основания стула, для перехода к следующему шагу.</p>

                        </div>
                    </div> <!-- single product desc-->
                </div> <!-- col12 -->

    <!--- -->
            </div> <!-- row -->
        </div>
    </div>


