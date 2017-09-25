<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode(Yii::$app->params['site_name']) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->params['site_name'],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => '登录', 'url' => ['/site/login']];
    } else {
        $menuItems = [
            ['label' => '订单', 'url' => ['/orders/index']],
            ['label' => '工人', 'url' => ['/worker/index'], 'visible' => Yii::$app->user->identity->company_id == 0],
            ['label' => '用户', 'url' => ['/user/index'], 'visible' => Yii::$app->user->identity->company_id == 0],
            ['label' => '服务项目', 'url' => ['/service/index']],
            ['label' => '公司', 'url' => ['/company/index'], 'visible' => Yii::$app->user->identity->company_id == 0],
            ['label' => '城市', 'url' => ['/city/index'], 'visible' => Yii::$app->user->identity->company_id == 0],
            ['label' => '国家', 'url' => ['/country/index'], 'visible' => Yii::$app->user->identity->company_id == 0],
            ['label' => '系统账号', 'url' => ['/account/index']],
        ];
        $menuItems[] = [
            'label' => '登出 (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Yii::$app->params['site_name'] ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
