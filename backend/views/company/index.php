<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Companies');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create') . Yii::t('app', 'Company'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'address',
            'phone',
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    return Yii::$app->params['status'][$data->status];
                },
                'filter' => Yii::$app->params['status'],
            ],
            'ctime',

            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'delete' => function ($model) {
                        return count($model->workers) == 0 && count($model->services) == 0 && count($model->products) == 0;
                    }
                ],
            ],
        ],
    ]); ?>

</div>
