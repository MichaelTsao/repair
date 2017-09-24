<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Services');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create') . Yii::t('app', 'Service'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'price',
            'company.name',
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    return \common\models\Logic::getDictValue(Yii::$app->params['status'], $data->status);
                },
                'filter' => Yii::$app->params['status'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['width' => '70px'],
                'visibleButtons' => [
                    'delete' => function ($model) {
                        return count($model->orders) == 0;
                    }
                ],
            ],
        ],
    ]); ?>

</div>
