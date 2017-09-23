<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--
    <p>
        <?= Html::a(Yii::t('app', 'Create').Yii::t('app', 'Orders'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    -->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'attribute'=>'user.name',
                'label' => '用户名',
            ],
            [
                'attribute'=>'worker.user.name',
                'label' => '工人名',
            ],
            'service.name',
            'price',
            'ctime',
//            'accept_time',
//            'pay_time',
//            'finish_time',
            [
                'attribute'=>'status',
                'value'=>function($data){
                    return Yii::$app->params['order_status'][$data->status];
                },
                'filter'=>Yii::$app->params['order_status'],
            ],

            ['class' => 'yii\grid\ActionColumn', 'options'=>['width'=>30], 'template'=>'{view}'],
        ],
    ]); ?>

</div>
