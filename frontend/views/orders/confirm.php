<?php
/* @var $this yii\web\View */
/* @var $serviceId string */
?>
<h1>确认订单</h1>
<br/>
<p>
    服务:<?= \common\models\Service::findOne($serviceId)->name ?><br/>
    价格:<?= \common\models\Service::findOne($serviceId)->price ?><br/>
</p>
<hr/>
<p>
    <a class="btn btn-lg btn-success" href="<?= \yii\helpers\Url::to(['create']) ?>">确认下单</a>&nbsp;&nbsp;
    <a class="btn btn-lg btn-default" href="<?= \yii\helpers\Url::to(['site/index']) ?>">取消</a>
</p>