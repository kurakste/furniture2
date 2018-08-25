<?php 
$this->registerJsFile('/js/sum.js', [
        'depends' => [\yii\web\JqueryAsset::className()] 
    ]);

?>


<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Ваш заказ</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive cart">
                                <thead>
                                    <tr>
                                        <th>Модель</th>
                                        <th>Цвета</th>
                                        <th>Количество</th>
                                        <th>цена</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0 ?>
                                <?php foreach ($carts as $cart): ?>

                                    <tr class='cart-row'>
                                        <td style='display: none;'>
                                            <?= $cart->item->id ?>
                                        </td>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="/img/<?= $cart->item->mainImage ?>" alt="Product"></a>
                                        </td>
                                        <td style='display: none;'>
                                            <?= $cart->color->id ?>
                                        </td>
                                        <td class="cart_product_desc">
                                        <?php if ($cart->item->cid === 1): ?>
                                            <div style ="width: 40%;">
                                            <a href="/img/material/<?= $cart->color->img ?>"><img src="/img/material/<?= $cart->color->img ?>" alt="Material"></a>
                                            </div>
                                            <div style ="width: 40%;">
                                            <a href="/img/material/<?= $cart->facture->img ?>"><img src="/img/material/<?= $cart->facture->img ?>" alt="Material"></a>
                                            </div>
                                        <?php endif ?>
                                        </td>
                                        <td style='display: none;'>
                                            <?= $cart->facture->id ?>
                                        </td>
                                        <td class="facture" style="display:none;">
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <?php 
                                                    $pref = ($i === 0) ? '' : $i;
                                                    ?>
                                                <p>Количество</p>
                                                <div class="quantity">
                                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty<?= $pref ?>'); var qty<?= $pref ?>= effect.value; if( !isNaN( qty<?= $pref ?> ) &amp;&amp; qty<?= $pref ?> &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input type="number" class="qty-text" id="qty<?= $pref ?>" step="1" min="1" max="300" name="quantity" value="<?= $cart->amount ?>">
                                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty<?= $pref ?>'); var qty<?= $pref ?> = effect.value; if( !isNaN( qty<?= $pref ?> )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="price">
                                            <span style = "margin-left: 20px"><?= $cart->item->price ?></span>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Сумма заказа</h5>
                            <ul class="summary-table">
                                <li><span><em><b>Заказ:</b></em></span> <span id='totalsum'>взять сумму</span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <a href="/orders/getform" class="btn amado-btn w-100">Оплатить</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

