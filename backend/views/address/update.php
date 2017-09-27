<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Address */
/* @var $user common\models\User */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => Yii::t('app', 'Address'),
    ]) . $model->name;
$owner = '';
if ($user) {
    $this->params['breadcrumbs'][] = ['label' => '用户', 'url' => ['user/index']];
    $owner = $user->name . '的';
}
$this->params['breadcrumbs'][] = ['label' => $owner . Yii::t('app', 'Addresses'),
    'url' => ['index', 'id' => $user ? $user->id : 0]];
$this->params['breadcrumbs'][] = ['label' => $model->name];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="address-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,
    ]) ?>

</div>
