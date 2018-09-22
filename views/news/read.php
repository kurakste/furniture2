<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application'; ?>

    <div class="products-catagories-area clearfix">
        <div class="amado-pro-catagory clearfix">
            <div class="single-products-catagory clearfix" style="width: 85%;">

                <div class="centered_rule">
                    <h1><?= $news->title ?></h1><hr>
                    <h4><?= $news->created_at ?></h4>
                    <?= $news->content ?><hr>
                    <a href="/news/tape">...смотреть все новости</a>
                </div>
            </div>
        </div>
        <!-- amado-pro-catagory clearfix -->
    </div>
    <!-- products-catagories-area clearfix -->

