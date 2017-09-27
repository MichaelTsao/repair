<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->params['site_name'];
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?= $this->title ?></h1>

        <p class="lead">最简单的维修平台</p>
        <br/>
        <p><a class="btn btn-lg btn-success" href="<?= \yii\helpers\Url::to(['orders/choose-service']) ?>">立即下单</a></p>
        <br/>
        <p><a class="btn btn-lg btn-primary" href="<?= \yii\helpers\Url::to(['orders/list']) ?>">订单列表</a></p>
        <br/>
        <br/>
        <p><a class="btn btn-lg btn-warning" href="<?= \yii\helpers\Url::to(['worker/apply']) ?>">注册成为工人</a></p>
        <p><a class="btn btn-lg btn-link" href="<?= \yii\helpers\Url::to(['site/user']) ?>">个人中心</a></p>
    </div>

    <div class="body-content">
    </div>
</div>
