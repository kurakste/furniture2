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
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates" rel="stylesheet">
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
    
    <div class="main-content-wrapper d-flex clearfix">
    <!-- Mobile Nav 767px-->
        <div class="mobile-nav">
            <div class="amado-navbar-brand">
                <a href="/"><img src="/logo/logo_icon.png" alt="logo"></a>
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
                    <a href="/"><img src="/img/logo_icon.png" alt="my icon"></a> 
                    
            <!--    data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+Cjxzdmcgd2lkdGg9IjEzMCIgaGVpZ2h0PSIxMzAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiA8IS0tIENyZWF0ZWQgd2l0aCBNZXRob2QgRHJhdyAtIGh0dHA6Ly9naXRodWIuY29tL2R1b3BpeGVsL01ldGhvZC1EcmF3LyAtLT4KIDxnPgogIDx0aXRsZT5iYWNrZ3JvdW5kPC90aXRsZT4KICA8cmVjdCBmaWxsPSIjZmZmIiBpZD0iY2FudmFzX2JhY2tncm91bmQiIGhlaWdodD0iMTMyIiB3aWR0aD0iMTMyIiB5PSItMSIgeD0iLTEiLz4KIDwvZz4KIDxnPgogIDx0aXRsZT5MYXllciAxPC90aXRsZT4KICA8cGF0aCBzdHJva2U9IiNmYmI3MTAiIGlkPSJzdmdfMiIgZD0ibTAuODEyNTE1LDY1LjQzODkxMWwyNy42NDI4NzYsLTU3LjM3NDkzNGw3My43MTQyMDMsMGwyNy42NDI5MDYsNTcuMzc0OTM0bC0yNy42NDI5MDYsNTcuMzc0OTYybC03My43MTQyMDMsMGwtMjcuNjQyODc2LC01Ny4zNzQ5NjJ6IiBzdHJva2Utd2lkdGg9IjEuNSIgZmlsbD0iI2ZiYjcxMCIvPgogIDxsaW5lIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9Im51bGwiIHN0cm9rZS1saW5lam9pbj0ibnVsbCIgaWQ9InN2Z18zIiB5Mj0iOTMuODc0OTQxIiB4Mj0iMjcuMDAwMDcxIiB5MT0iNDMuMTI1MDM2IiB4MT0iMjcuNTAwMDciIHN0cm9rZS13aWR0aD0iMyIgZmlsbD0ibm9uZSIvPgogIDxsaW5lIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9Im51bGwiIHN0cm9rZS1saW5lam9pbj0ibnVsbCIgaWQ9InN2Z180IiB5Mj0iNjguODc0OTkxIiB4Mj0iNTMuNTAwMDYiIHkxPSI2OC42MjQ5OTIiIHgxPSIyNy4yNTAwNjUiIHN0cm9rZS13aWR0aD0iMyIgZmlsbD0ibm9uZSIvPgogIDxsaW5lIHN0cm9rZS1saW5lY2FwPSJudWxsIiBzdHJva2UtbGluZWpvaW49Im51bGwiIGlkPSJzdmdfNSIgeTI9Ijk0LjM3NDk0NiIgeDI9IjUxLjc1MDAzOCIgeTE9IjY5LjM3NDk5IiB4MT0iNTIuMDAwMDM4IiBzdHJva2Utd2lkdGg9IjMiIHN0cm9rZT0iI2ZmZmZmZiIgZmlsbD0ibm9uZSIvPgogIDxsaW5lIHN0cm9rZT0iI2ZiYjcxMCIgc3Ryb2tlLWxpbmVjYXA9Im51bGwiIHN0cm9rZS1saW5lam9pbj0ibnVsbCIgaWQ9InN2Z184IiB5Mj0iNjYuNDk3NzU5IiB4Mj0iNjkuMjQ3NjY3IiB5MT0iNDcuODczMzg4IiB4MT0iNjguODcyNjgiIHN0cm9rZS1vcGFjaXR5PSJudWxsIiBzdHJva2Utd2lkdGg9IjEuNSIgZmlsbD0ibm9uZSIvPgogIDxsaW5lIHN0cm9rZS1saW5lY2FwPSJudWxsIiBzdHJva2UtbGluZWpvaW49Im51bGwiIGlkPSJzdmdfMTIiIHkyPSI2NS4xMjI4MDYiIHgyPSI1OS45OTc5NzkiIHkxPSI5My44NzE4MzgiIHgxPSI2MC4xMjI5NzUiIHN0cm9rZS13aWR0aD0iMyIgc3Ryb2tlPSIjZmZmZmZmIiBmaWxsPSJub25lIi8+CiAgPGxpbmUgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2UtbGluZWNhcD0ibnVsbCIgc3Ryb2tlLWxpbmVqb2luPSJudWxsIiBpZD0ic3ZnXzEzIiB5Mj0iNjMuOTk3ODQ0IiB4Mj0iODkuOTk2OTY5IiB5MT0iNjMuODcyODQ4IiB4MT0iMzIuMzczOTA5IiBzdHJva2Utd2lkdGg9IjMiIGZpbGw9Im5vbmUiLz4KICA8bGluZSBzdHJva2UtbGluZWNhcD0ibnVsbCIgc3Ryb2tlLWxpbmVqb2luPSJudWxsIiBpZD0ic3ZnXzE0IiB5Mj0iOTMuODcxODM4IiB4Mj0iNjkuMTIyNjcxIiB5MT0iNjcuNDk3NzI2IiB4MT0iNjkuMTIyNjcxIiBzdHJva2Utd2lkdGg9IjMiIHN0cm9rZT0iI2ZmZmZmZiIgZmlsbD0ibm9uZSIvPgogIDxsaW5lIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9Im51bGwiIHN0cm9rZS1saW5lam9pbj0ibnVsbCIgaWQ9InN2Z18xNSIgeTI9IjY4Ljk5NzY3NiIgeDI9Ijk2LjI0Njc0NiIgeTE9IjY4Ljk5NzY3NiIgeDE9IjY5LjQ5NzY1OSIgc3Ryb2tlLXdpZHRoPSIzIiBmaWxsPSJub25lIi8+CiAgPGxpbmUgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2UtbGluZWNhcD0ibnVsbCIgc3Ryb2tlLWxpbmVqb2luPSJudWxsIiBpZD0ic3ZnXzE2IiB5Mj0iOTQuMTIxODA3IiB4Mj0iOTQuODcxODA0IiB5MT0iNDEuNzQ4NTk0IiB4MT0iOTQuOTk2OCIgc3Ryb2tlLXdpZHRoPSIzIiBmaWxsPSJub25lIi8+CiA8L2c+Cjwvc3ZnPg==   -->     
                    
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

            <!-- Header -->
            <header class="header-area clearfix">
                <div class="nav-close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </div>

                <div class="logo">
                    <a href="/"><img src="../view/images/logo_icon.png" alt="my icon"></a>

                    <!--    data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+Cjxzdmcgd2lkdGg9IjEzMCIgaGVpZ2h0PSIxMzAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiA8IS0tIENyZWF0ZWQgd2l0aCBNZXRob2QgRHJhdyAtIGh0dHA6Ly9naXRodWIuY29tL2R1b3BpeGVsL01ldGhvZC1EcmF3LyAtLT4KIDxnPgogIDx0aXRsZT5iYWNrZ3JvdW5kPC90aXRsZT4KICA8cmVjdCBmaWxsPSIjZmZmIiBpZD0iY2FudmFzX2JhY2tncm91bmQiIGhlaWdodD0iMTMyIiB3aWR0aD0iMTMyIiB5PSItMSIgeD0iLTEiLz4KIDwvZz4KIDxnPgogIDx0aXRsZT5MYXllciAxPC90aXRsZT4KICA8cGF0aCBzdHJva2U9IiNmYmI3MTAiIGlkPSJzdmdfMiIgZD0ibTAuODEyNTE1LDY1LjQzODkxMWwyNy42NDI4NzYsLTU3LjM3NDkzNGw3My43MTQyMDMsMGwyNy42NDI5MDYsNTcuMzc0OTM0bC0yNy42NDI5MDYsNTcuMzc0OTYybC03My43MTQyMDMsMGwtMjcuNjQyODc2LC01Ny4zNzQ5NjJ6IiBzdHJva2Utd2lkdGg9IjEuNSIgZmlsbD0iI2ZiYjcxMCIvPgogIDxsaW5lIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9Im51bGwiIHN0cm9rZS1saW5lam9pbj0ibnVsbCIgaWQ9InN2Z18zIiB5Mj0iOTMuODc0OTQxIiB4Mj0iMjcuMDAwMDcxIiB5MT0iNDMuMTI1MDM2IiB4MT0iMjcuNTAwMDciIHN0cm9rZS13aWR0aD0iMyIgZmlsbD0ibm9uZSIvPgogIDxsaW5lIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9Im51bGwiIHN0cm9rZS1saW5lam9pbj0ibnVsbCIgaWQ9InN2Z180IiB5Mj0iNjguODc0OTkxIiB4Mj0iNTMuNTAwMDYiIHkxPSI2OC42MjQ5OTIiIHgxPSIyNy4yNTAwNjUiIHN0cm9rZS13aWR0aD0iMyIgZmlsbD0ibm9uZSIvPgogIDxsaW5lIHN0cm9rZS1saW5lY2FwPSJudWxsIiBzdHJva2UtbGluZWpvaW49Im51bGwiIGlkPSJzdmdfNSIgeTI9Ijk0LjM3NDk0NiIgeDI9IjUxLjc1MDAzOCIgeTE9IjY5LjM3NDk5IiB4MT0iNTIuMDAwMDM4IiBzdHJva2Utd2lkdGg9IjMiIHN0cm9rZT0iI2ZmZmZmZiIgZmlsbD0ibm9uZSIvPgogIDxsaW5lIHN0cm9rZT0iI2ZiYjcxMCIgc3Ryb2tlLWxpbmVjYXA9Im51bGwiIHN0cm9rZS1saW5lam9pbj0ibnVsbCIgaWQ9InN2Z184IiB5Mj0iNjYuNDk3NzU5IiB4Mj0iNjkuMjQ3NjY3IiB5MT0iNDcuODczMzg4IiB4MT0iNjguODcyNjgiIHN0cm9rZS1vcGFjaXR5PSJudWxsIiBzdHJva2Utd2lkdGg9IjEuNSIgZmlsbD0ibm9uZSIvPgogIDxsaW5lIHN0cm9rZS1saW5lY2FwPSJudWxsIiBzdHJva2UtbGluZWpvaW49Im51bGwiIGlkPSJzdmdfMTIiIHkyPSI2NS4xMjI4MDYiIHgyPSI1OS45OTc5NzkiIHkxPSI5My44NzE4MzgiIHgxPSI2MC4xMjI5NzUiIHN0cm9rZS13aWR0aD0iMyIgc3Ryb2tlPSIjZmZmZmZmIiBmaWxsPSJub25lIi8+CiAgPGxpbmUgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2UtbGluZWNhcD0ibnVsbCIgc3Ryb2tlLWxpbmVqb2luPSJudWxsIiBpZD0ic3ZnXzEzIiB5Mj0iNjMuOTk3ODQ0IiB4Mj0iODkuOTk2OTY5IiB5MT0iNjMuODcyODQ4IiB4MT0iMzIuMzczOTA5IiBzdHJva2Utd2lkdGg9IjMiIGZpbGw9Im5vbmUiLz4KICA8bGluZSBzdHJva2UtbGluZWNhcD0ibnVsbCIgc3Ryb2tlLWxpbmVqb2luPSJudWxsIiBpZD0ic3ZnXzE0IiB5Mj0iOTMuODcxODM4IiB4Mj0iNjkuMTIyNjcxIiB5MT0iNjcuNDk3NzI2IiB4MT0iNjkuMTIyNjcxIiBzdHJva2Utd2lkdGg9IjMiIHN0cm9rZT0iI2ZmZmZmZiIgZmlsbD0ibm9uZSIvPgogIDxsaW5lIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLWxpbmVjYXA9Im51bGwiIHN0cm9rZS1saW5lam9pbj0ibnVsbCIgaWQ9InN2Z18xNSIgeTI9IjY4Ljk5NzY3NiIgeDI9Ijk2LjI0Njc0NiIgeTE9IjY4Ljk5NzY3NiIgeDE9IjY5LjQ5NzY1OSIgc3Ryb2tlLXdpZHRoPSIzIiBmaWxsPSJub25lIi8+CiAgPGxpbmUgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2UtbGluZWNhcD0ibnVsbCIgc3Ryb2tlLWxpbmVqb2luPSJudWxsIiBpZD0ic3ZnXzE2IiB5Mj0iOTQuMTIxODA3IiB4Mj0iOTQuODcxODA0IiB5MT0iNDEuNzQ4NTk0IiB4MT0iOTQuOTk2OCIgc3Ryb2tlLXdpZHRoPSIzIiBmaWxsPSJub25lIi8+CiA8L2c+Cjwvc3ZnPg==   -->

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
                                <input type="tel" id="phone" name="phone" class="nl-tel" placeholder="8-999-555-00-00" pattern="[0-9]{1}-[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}">
                                <input type="submit" value="Отправить">
                                
                            </form>


                                <!--<form action="/site/send-mail" method="post">
                                <input type="email" name="email" class="nl-email" placeholder="Введите номер телефона">
                                <input type="submit" value="Отправить">
                            </form> -->
                                <!-- <input type="tel" id="phone" name="phone"
                                   placeholder="123-456-7890"
                                   pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                            <input type="submit" value="Отправить"> -->
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
                                <a href="/"><img src="/img/___logo1.jpg" alt="logo"></a>
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
