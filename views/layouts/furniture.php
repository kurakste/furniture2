<?php
use yii\helpers\Html;
use app\assets\AppAsset;
use app\objects\CartsBModel;

AppAsset::register($this);

$this->beginPage(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Чепецкая мебельная фабрика</title>
    <link rel="icon" href="/icon/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates" rel="stylesheet">
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
    
    <div class="main-content-wrapper d-flex clearfix">
    <!-- Mobile Nav 767px-->
        <div class="mobile-nav">
            <div class="amado-navbar-brand">
                <a href="/"><img src="/icon/logo.png" alt="logo"></a>
            </div>
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>


            <!-- Header -->
            <header class="header-area clearfix">
                <div class="nav-close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </div>

                <div class="logo">
                    <a href="/"><img src="/icon/logo.png" alt="my icon"></a>

        
                </div>

                <nav class="amado-nav">
                    <ul>
                        <li class="active"><a href="/">Главная</a></li>
                        <li><a href="/site/tables">Обеденные группы</a></li>
                        <li><a href="/site/terms">Условия работы</a></li>
                        <li><a href="/news/tape">Новости</a></li>
                        <li><a href="/site/contact">Контакты</a></li>
                        <li><a href="/site/about">О компании</a></li>
                    </ul>
                </nav>
                <br>
                <br>
                <!-- Cart Menu -->
                <div class="cart-fav-search mb-100">
                    <a href="/cart/get-cart" class="cart-nav"><img src="/img/core-img/cart.png" alt="">  Корзина <span>(<?= CartsBModel::getAmountItemsInCart() ?>)</span></a>
                    <a href="/site/favorite" class="fav-nav"><img src="/img/core-img/favorites.png" alt=""> Скидки %</a>
                </div>
                <br>
                <br>
                <!-- Social -->
                <div class="social-info d-flex justify-content-between">
                    <a href="https://www.instagram.com/chepcamebel" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="https://www.facebook.com/chepcamebel/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="https://m.vk.com/club117603272" target="_blank"><i class="fa fa-vk" aria-hidden="true"></i></a>
                </div>
            </header>


            <?= $content ?>


        </div>
        <section class="newsletter-area section-padding-100-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-6 col-xl-7">
                        <div class="newsletter-text mb-100">
                            <h2>Закажите <span>обратный звонок</span></h2>
                            <p>Отправьте номер и вам перезвонят в течении 30 минут</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-5">
                        <div class="newsletter-form mb-100">
                            <form action="/site/send-mail" method="post">
                                <div class="input_tel">
                                    <input type="tel" id="phone" name="phone" class="nl-tel" placeholder="8-999-555-00-00" pattern="[0-9]{1}-[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}">
                                </div>
                                <input type="submit" value="Отправить">
                                
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer_area clearfix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-4">
                        <div class="single_widget_area">
                            <!-- Logo -->
                            <div class="footer-logo mr-50">
                                <a href="/"><img src="/icon/logo.png" alt="logo"></a>
                            </div>

                            <p class="copywrite">
                                Copyright &copy; All rights reserved | Produced by 3Kita Studio 2018
                                <a href="http://www.3kita-studio.ru" target="_blank">3Kita Studio</a>
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-lg-8">
                        <div class="single_widget_area">
                            <!-- Footer Menu -->
                            <div class="footer_menu">
                                <nav class="navbar navbar-expand-lg justify-content-end">
                                    <div class="collapse navbar-collapse" id="footerNavContent">

                                        <ul class="navbar-nav ml-auto">


                                            <li class="nav-item"><a class="nav-link" href="/">Главная</a></li>
                                            <li class="nav-item"><a class="nav-link" href="/site/tables">Обеденные группы</a></li>
                                            <li class="nav-item"><a class="nav-link" href="/site/terms">Условия работы</a></li>
                                            <li class="nav-item"><a class="nav-link" href="/news/tape">Новости</a></li>
                                            <li class="nav-item"><a class="nav-link" href="/site/contact">Контакты</a></li>
                                            <li class="nav-item"><a class="nav-link" href="/site/about">О компании</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>

    </html>
    <?php $this->endPage() ?>
