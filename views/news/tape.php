<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application'; ?>



    <div class="products-catagories-area clearfix">
        <div class="amado-pro-catagory clearfix">
            <div class="single-products-catagory clearfix" style="width: 85%;">

                <div class="centered_rule">
                    <h1><b>Ключевые новости отрасли</b></h1>
                    <hr>

                    <?php foreach ($news as $new): ?>
                    <h1>
                        <?= $new->title ?>
                    </h1>
                    <h4>
                        <?= $new->created_at ?>
                    </h4>
                    <div class="wrapper_text">
                        <?= substr($new->content, 0, 500) ?>
                    </div>

                    <a href="/news/read?id=<?= $new->id?>">...читать статью</a>
                    <hr>
                    <?php endforeach ?>

                </div>
            </div>
        </div>
        <!-- amado-pro-catagory clearfix -->
    </div>
    <!-- products-catagories-area clearfix -->
