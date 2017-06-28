<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Worker */

$this->title = Yii::t('app', 'Update').Yii::t('app', 'Worker') . ' ' . $model->user->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user->name, 'url' => ['view', 'id' => $model->worker_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="worker-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model_user' => $model_user,
    ]) ?>

</div>
