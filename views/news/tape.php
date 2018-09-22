<div class="wrapper">
    <div class="wrapper_target">
        <h1><b>Ключевые новости отрасли</b></h1>

        <?php foreach ($news as $new): ?>
        <h1>
            <?= $new->title ?>
        </h1>
        <h4>
            <?= $new->created_at ?>
        </h4>
        <div style="width: 800px;">
            <?= substr($new->content, 0, 500) ?>
        </div>

        <a href="/news/read?id=<?= $new->id?>">читать дальше</a>
        <?php endforeach ?>
    </div>

</div>
