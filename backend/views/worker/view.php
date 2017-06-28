<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Worker;

/* @var $this yii\web\View */
/* @var $model common\models\Worker */

$this->title = $model->user->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->worker_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->worker_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'worker_id',
            'user.name',
            'company.name',
            'department',
            [
                'attribute'=>'level',
                'value'=>\common\models\Logic::getDictValue(Yii::$app->params['worker_level'], $model->level),
            ],
            'position',
            [
                'attribute'=>'status',
                'value'=>Worker::$status[$model->status],
            ],
        ],
    ]) ?>

</div>
