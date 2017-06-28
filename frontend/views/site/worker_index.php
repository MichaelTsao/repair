<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->params['site_name'];
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?= $this->title ?></h1>

        <p class="lead">最简单的维修平台</p>
        <p>工人版</p>
        <br/>
        <p><a class="btn btn-lg btn-info" href="/worker/orders-list">我的订单列表</a></p>
    </div>

    <div class="body-content">
    </div>
</div>
