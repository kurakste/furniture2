<?php
use yii\helpers\Html;
use app\assets\AppAsset;

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
                <a href="/"><img src="img/mailrusigimg_1.png" alt="logo"></a>
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
                <a href="/"><img src="/img/mailrusigimg_1.png" alt="my icon"></a>
            </div>
            
            <nav class="amado-nav">
                <ul>
                    <li class="active"><a href="/">Главная</a></li>
                    <li><a href="/catalog">Каталог</a></li>
                    <li><a href="/cart/get-cart">Корзина 
                            <?php if (isset($this->params['cartscount'])): ?>
                            <span class='badge'><?= $this->params['cartscount'] ?>
                            </span>
                            <?php endif; ?>
                       </a>
                    </li>
                    <li><a href="/cabinet">Личный кабинет</a></li>
                    <li><a href="#">Контакты</a></li>
                </ul>
            </nav>
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
                            <a href="/"><img src="img/mailrusigimg_1.png" alt="logo"></a>
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
                                        <li class="nav-item active">
                                            <a class="nav-link" href="/">Главная</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/catalog">Каталог</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/cart">Корзина</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Админка</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Контакты</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    

    <!-- Script -
    <script src="/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="/js/plugins.js"></script>

    <!-- Active js -->
    <script src="/js/active.js"></script>
-->

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
