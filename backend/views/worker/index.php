<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Worker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WorkerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Workers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create').Yii::t('app', 'Worker'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'worker_id',
            'user.name',
            'company.name',
            'department',
            [
                'attribute'=>'level',
                'value'=>function($data){return \common\models\Logic::getDictValue(Yii::$app->params['worker_level'], $data->level);},
                'filter'=>Yii::$app->params['worker_level'],
            ],
            [
                'attribute'=>'status',
                'value'=>function($data){return Worker::$status[$data->status];},
                'filter'=>Worker::$status,
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'options'=>['width'=>'70px'],
            ],
        ],
    ]); ?>

</div>
