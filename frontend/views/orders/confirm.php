<?php
/* @var $this yii\web\View */
?>
<h1>确认订单</h1>
<br/>
<p>
    服务:<?= \common\models\Service::findOne(['service_id'=>$data['service']])->name ?><br/>
    价格:<?= \common\models\Service::findOne(['service_id'=>$data['service']])->price ?><br/>
</p>
<hr/>
<p><a class="btn btn-lg btn-success" href="/orders/create">确认下单</a>&nbsp;&nbsp;<a class="btn btn-lg btn-default" href="/site/index">取消</a></p>