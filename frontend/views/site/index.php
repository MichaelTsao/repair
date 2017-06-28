<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->params['site_name'];
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?= $this->title ?></h1>

        <p class="lead">最简单的维修平台</p>
        <br/>
        <p><a class="btn btn-lg btn-success" href="/orders/choose-service">立即下单</a></p>
        <br/>
        <p><a class="btn btn-lg btn-primary" href="/orders/list">订单列表</a></p>
        <br/>
        <br/>
        <p><a class="btn btn-lg btn-warning" href="/worker/apply">注册成为工人</a></p>
    </div>

    <div class="body-content">
    </div>
</div>
