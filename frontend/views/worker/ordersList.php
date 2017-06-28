<?php
/**
 * Created by PhpStorm.
 * User: caoxiang
 * Date: 15/11/19
 * Time: 上午11:48
 */
/* @var $this yii\web\View */
?>
<h1>订单列表</h1>
<br/>
<?php foreach($data as $one): ?>
    <p onclick="window.location.href='/worker/order-info?id=<?= $one->order_id ?>'">
        用户:<?= $one->user->name ?><br/>
        服务:<?= $one->service->name ?><br/>
        价格:<?= \common\models\Service::findOne(['service_id'=>$one->service_id])->price ?><br/>
        状态:<b><?= Yii::$app->params['order_status'][$one->status] ?></b><br/>
    </p>
    <hr/>
<?php endforeach ?>
