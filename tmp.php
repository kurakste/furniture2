
                                        <td class="cart_product_img">
                                            <a href="#"><img src="/img/<?= $row->item->mainImage ?>" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?= $row->item->name ?></h5>
                                        </td>
                                        <td class="price">
                                        <span><?= $row->item->price ?></span>
                                        <img src="<?= $row->facture->img ?>" alt="" />
                                        <img src="<?= $row->color->img ?>" alt="" />
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                               <p>Количество</p>
                                                <div class="quantity">
                                                <?php 
                                                    $pref = ($i === 0) ? '' : $i;

                                                    ?>
                                                   <span class="qty-minus" onclick="var effect = document.getElementById('qty<?= $pref ?>'); var qty<?= $pref ?> = effect.value; if( !isNaN( qty<?= $pref ?> ) &amp;&amp; qty<?= $pref ?> &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                   <input type="number" class="qty-text" id="qty<?= $pref ?>" step="1" min="1" max="300" name="amount" value="<?= $row->amount ?>">
                                                   <span class="qty-plus" onclick="var effect = document.getElementById('qty<?= $pref ?>'); var qty<?= $pref ?> = effect.value; if( !isNaN( qty<?= $pref ?> )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </td>
