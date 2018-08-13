<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Ваш заказ</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Модель</th>
                                        <th>Цвет основания</th>
                                        <th>Цвет обивки</th>
                                        <th>Количество</th>
                                        <th>цена</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0 ?>
                                <?php foreach ($cart as $row): ?>

                                    <tr>
                                        <td style='display: none;'>
                                            <?= $row->item->id ?>
                                        </td>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="/img/<?= $row->item->mainImage ?>" alt="Product"></a>
                                        </td>
                                        <td style='display: none;'>
                                            <?= $row->color->id ?>
                                        </td>
                                        <td class="cart_product_desc">
                                            <a href="#"><img src="<?= $row->color->img ?><?= $row->facture->img ?>" alt="Material"></a>
                                        </td>
                                        <td style='display: none;'>
                                            <?= $row->facture->id ?>
                                        </td>
                                        <td class="facture">
                                            <a href="#"><img src="<?= $row->facture->img ?>" alt="Material"></a>
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <?php 
                                                    $pref = ($i === 0) ? '' : $i;
                                                    ?>
                                                <p>Количество</p>
                                                <div class="quantity">
                                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty<?= $pref ?>'); var qty<?= $pref ?>= effect.value; if( !isNaN( qty<?= $pref ?> ) &amp;&amp; qty<?= $pref ?> &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input type="number" class="qty-text" id="qty<?= $pref ?>" step="1" min="1" max="300" name="quantity" value="0">
                                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty<?= $pref ?>'); var qty<?= $pref ?> = effect.value; if( !isNaN( qty<?= $pref ?> )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="price">
                                            <span><?= $row->item->price ?></span>
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
                                <li><span><em><b>Доставка:</b></em></span> <span>взять с карты</span></li>
                                <li><span><b>Итого:</b></span> <span>Заказ+доставка</span></li>
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

