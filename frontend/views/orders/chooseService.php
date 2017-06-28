<?php
/* @var $this yii\web\View */
?>
    <h1>选择服务</h1>
    <br/>
<?php foreach($service as $one): ?>
    <p onclick="window.location.href='/orders/choose-service?id=<?= $one->service_id ?>'">
        <?= $one->name ?>&nbsp;&nbsp;&nbsp;&nbsp;价格:<?= $one->price ?>
    </p>
    <hr/>
<?php endforeach ?>