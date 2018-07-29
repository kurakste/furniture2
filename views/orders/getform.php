<?php
/* @var $this yii\web\View */
?>


            <div class="cart-table-area section-padding-100">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                           <div class="cart-title">
                              <h2>Карточка клиента</h2>
                           </div>

                           <form id='client' action="/orders/store-order" method="post">
                              <div class="row">
                                 <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" id="first_name" name='name' value="" placeholder="Как к вам обращаться" required>
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" id="last_name" name='lname' value="" placeholder="Ваша фамилия" required>
                                 </div>
                                 <!-- <div class="col-12 mb-3"> -->
                                 <!--    <input type="text" class="form-control" id="company" placeholder="Название компании, если есть" value=""> -->
                                 <!-- </div> -->
                                 <div class="col-12 mb-3">
                                    <input type="email" class="form-control" id="email" name='email' placeholder="Ваш электронный ящик" value="">
                                 </div>
                                 <!-- <div class="col-12 mb-3"> -->
                                 <!--    <select class="w-100" id="country"> -->
                                 <!--       <option value="usa">Россия</option> -->
                                 <!--       <option value="uk">Англия</option> -->
                                 <!--       <option value="ger">Германия</option> -->
                                 <!--       <option value="fra">Франция</option> -->
                                 <!--       <option value="ind">Индия</option> -->
                                 <!--       <option value="aus">Австралия</option> -->
                                 <!--       <option value="bra">Бразилия</option> -->
                                 <!--       <option value="cana">Канада</option> -->
                                 <!--    </select> -->
                                 <!-- </div> -->
                                 <div class="col-12 mb-3">
                                    <input type="text" class="form-control mb-3" name='addr' id="street_address" placeholder="Адрес доставки" value="">
                                 </div>
                                 <div class="col-12 mb-3">
                                    <input type="text" class="form-control" name='city' id="city" placeholder="Город" value="">
                                 </div>
                                 <!-- <div class="col-md-6 mb-3"> -->
                                 <!--    <input type="text" class="form-control" id="zipCode" placeholder="Код купона на скидку" value=""> -->
                                 <!-- </div> -->
                                 <div class="col-md-6 mb-3">
                                    <input type="number" class="form-control" name='phone' id="phone_number" min="0" placeholder="Номер телефона" value="">
                                 </div>
                                 <div class="col-12 mb-3">
                                    <textarea name="comments" class="form-control w-100" id="comments" cols="30" rows="10" placeholder="Напишите комментарии по заказу"></textarea>
                                 </div>

                                 <!-- <div class="col-12"> -->
                                 <!--    <div class="custom-control custom-checkbox d-block mb-2"> -->
                                 <!--       <input type="checkbox" class="custom-control-input" id="customCheck2"> -->
                                 <!--       <label class="custom-control-label" for="customCheck2">Новый пользователь</label> -->
                                 <!--    </div> -->
                                 <!--    <1!-- <div class="custom-control custom-checkbox d-block"> --1> -->
                                 <!--    <1!--    <input type="checkbox" class="custom-control-input" id="customCheck3"> --1> -->
                                 <!--    <1!--    <label class="custom-control-label" for="customCheck3">Существующий клиент</label> --1> -->
                                 <!--    <1!-- </div> --1> -->
                                 <!-- </div> -->
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                           <h5>Ваши заказы</h5>
                           <ul class="summary-table">
                           <li><span>Сумма заказа:</span> <span><?= number_format($summ, 2) ?></span></li>
                              <li><span>Ваши бонусные баллы:</span> <span>0</span></li>


                           </ul>

                           <div class="cart-btn mt-100">
                              <input class="btn amado-btn w-100" form="client" type="submit" value='Оплатить'/>
                              <!-- <a href="#" class="btn amado-btn w-100">Оплатить</a> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

