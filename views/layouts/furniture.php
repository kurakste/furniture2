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
    <link rel="icon" href="/img/title_icon.png">
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
    
    <div class="main-content-wrapper d-flex clearfix">
    <!-- Mobile Nav 767px-->
        <div class="mobile-nav">
            <div class="amado-navbar-brand">
                <a href="/"><img src="/img/logo1.jpg" alt="logo"></a>
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
                    <a href="/"><img src="/img/logo1.jpg" alt="my icon"></a> 
            </div>
        
            <nav class="amado-nav">
                <ul>
                    <li class="active"><a href="/">Главная</a></li>
                    <li><a href="/catalog">Каталог</a></li>
                    <li><a href="/site/tables">Обеденные группы</a></li>
                    <li><a href="/cart/get-cart">Корзина </a></li>
                    <li><a href="/site/contact">Контакты</a></li>
                    <li><a href="/site/about">О компании</a></li>
                </ul>
         </nav>
        <br>
        <br>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
            <a href="/cart/get-cart" class="cart-nav"><img src="/img/core-img/cart.png" alt="">  Корзина <span>(<?= CartsBModel::getAmountItemsInCart() ?>)</span></a>
                <a href="#" class="fav-nav"><img src="/img/core-img/favorites.png" alt=""> Favourite</a>
                <a href="#" class="search-nav"><img src="/img/core-img/search.png" alt=""> Search</a>
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
                            <h2>Напишите <span>нам</span></h2>
                            <p>Если вы хотите получить персональное предложение, то отправьте нам сообщение</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-5">
                        <div class="newsletter-form mb-100">
                            <form action="#" method="post">
                                <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
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
                           <a href="/"><img src="/img/logo1.jpg" alt="logo"></a>
                        </div>
                        
                        <p class="copywrite">
                            Copyright &copy; All rights reserved | Produced by NextBestStep 2018 
                           <a href="www.nextbeststep.ru" target="_blank">NextBestStep</a>
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
                                        <li class="nav-item"><a class="nav-link" href="/site/chair">Стулья</a></li>
                                        <li class="nav-item"><a class="nav-link" href="/site/tables">Обеденные группы</a></li>
                                        <li class="nav-item"><a class="nav-link" href="/cart/get-cart">Корзина </a></li>
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
