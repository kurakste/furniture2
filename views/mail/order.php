<?php
// $ostrings - strings of order
// $order - order
?>

<h2> Поступил заказ № <?= $order->id ?> </h2>

<p>Имя: <?= $order->name ?> </p>
<p>Фамилия: <?= $order->lname ?> </p>
<p>Телефон: <?= $order->phone ?> </p>
<p>e-mail: <?= $order->email ?> </p>
<p>Код города ПЭК: <?= $order->city ?> </p>
<p>Город: <?= $order->cityName->name ?> </p>
<p>Адрес: <?= $order->addr ?> </p>
<p>Доставка до двери? <?= $order->delivery_to_door ?> </p>
<p>Комментарий: <?= $order->comments ?> </p>
<p>Стоимость стоимость доставки: <?= $order->deliveryсost ?> </p>
<p>Стоимость заказа: <?= $order->totalsumm ?> </p>

<table>
    <tr>
        <th>Наименование</th>
        <th>цена</th>
        <th>кол-во</th>
    </tr>
    
<?php foreach ($strings as $string) : ?>
    <tr>
    <td><?= $string->item->name ?></td>
    <td><?= $string->item->price ?></td>
    <td><?= $string->amount ?></td>
    </tr>
<?php endforeach ?>
    
</table>
