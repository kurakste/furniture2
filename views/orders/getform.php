<?php
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\web\JsExpression;

$this->registerJsFile(\Yii::$app->request->baseUrl.'/js/calcdelivery.js',[
        'depends'=> \yii\web\JqueryAsset::className(),
        ]);

?>


<div class="cart-table-area section-padding-100">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12 col-lg-8">
            <div class="checkout_details_area mt-50 clearfix">

               <div class="cart-title">
                  <h2>Оформление заказа.</h2>
               </div>
    
                <?php $this->registerJsFile('/js/cityselect.js', ['depends' => \yii\web\JqueryAsset::className()]); ?>


<?php
                $form = ActiveForm::begin([
                    'id' => 'client',
                    'options' => [
                        'enctype' => 'multipart/form-data',
                        'data' => ['pjax' => true],
                    ],
                ]); 
?>
                
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <?= $form->field($model, 'name')->textinput(array 
                            (
                                'placeholder' => "Введите ваше имя",
                                'class' => "form-control",
                                'id' => "first_name",
                            )
                            )->label(false)
                            
                            ; ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <?= $form->field($model, 'lname')->textinput(array 
                                    (
                                        'placeholder' => "Введите  вашу фамилию",
                                        'class' => "form-control",
                                        'id' => "last_name",
                                    )
                                )->label(false)
                                
                                ; ?>

                    </div>
                    <div class="col-md-12 mb-3">
                        <?= $form->field($model, 'email')->input('email', array 
                                    (
                                        'placeholder' => "Введите адрес электронной почты.",
                                        'class' => "form-control",
                                        'id' => "email",

                                    )
                                )->label(false)
                                
                                ; ?>
                    </div>
                    <div class="col-md-12 mb-3">

                    <?= $form->field($model, 'city')->textinput(array 
                                    (
                                        'placeholder' => "Город",
                                        'class' => "form-control",
                                        'id' => "cityid",
                                        'style' => 'display: none;',
                                    ))
                                ->label(false); ?>
                    </div>

                    <div class="col-12 mb-3" >
                        <input id="cityselector"  AUTOCOMPLETE="off" type="text" class="form-control mb-3" id="street_address" placeholder="Введите первые буквы названия города." value="">
                    </div>

                <div id='citycont' style ="width: 100%"></div>
                    <div class="col-md-12 mb-3">
                        <?= $form->field($model, 'addr')->textinput(array 
                                    (
                                        'placeholder' => "Введите адрес доставки.",
                                        'class' => "form-control",
                                        'id' => "addr",

                                    )
                                )->label(false)
                                
                                ; ?>
                    </div> 
                    <div class="col-md-12 mb-3">
                        <?= $form->field($model, 'delivery_to_door')->dropDownList(array 
                                    (
                                        '0' => "Заберу из пункта выдачи.",
                                         '1' => 'доставить до дома',
                                    ) , array 
                                    (
                                        'placeholder' => "уточните тип доставки",
                                        'class' => "",
                                        'id' => "delivery_to_door",

                                    )

                                )->label(false);
                                
                                ; ?>
                    </div> 
                    <div class="col-md-12 mb-3">
                        <?= $form->field($model, 'phone')->textinput(array 
                                    (
                                        'placeholder' => "Введите телефон для связи.",
                                        'class' => "form-control",
                                        'id' => "phone",

                                    )
                                )->label(false)
                                
                                ; ?>
                    </div>
                    <div class="col-md-12 mb-3">
                        <?= $form->field($model, 'comments')->textinput(array 
                                    (
                                        'placeholder' => "Напишите комментарии по заказу.",
                                        'class' => "form-control",
                                        'id' => "comments",

                                    )
                                )->label(false)
                                
                                ; ?>
                    </div>
                    <div class="col-md-12 mb-3" >
                        <?= $form->field($model, 'deliveryсost')->hiddenInput(array 
                                    (
                                        'placeholder' => "delivery cost",
                                        'class' => "form-control",
                                        'id' => "ffdeliverycost",

                                    )
                                )->label(false)
                                ; ?>
                    </div>
                    <div class="col-md-12 mb-3">
                        <?= $form->field($model, 'totalsumm')->hiddenInput(array 
                                    (
                                        'placeholder' => "totalsumm",
                                        'class' => "form-control",
                                        'id' => "fftotalsumm",
                                        'value' =>$summ, 
                                    )
                                )->label(false)
                                
                                ; ?>
                    </div>
                </div>

                
                <?php ActiveForm::end(); ?>



            </div>
         </div>
         <div class="col-12 col-lg-4">
            <div class="cart-summary">
               <h5>Ваши заказы</h5>
               <ul class="summary-table">
               <li><span>Сумма заказа:</span> <span id ='ordercost'><?= number_format($summ, 2) ?></span></li>
               <li><span>Стоимость доставки</span> <span id='deliveryCost'>0</span></li>
               <li><span>Итого с доставкой</span> <span id='sumwithdelivery'><?= number_format($summ, 2) ?></span></li>


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

