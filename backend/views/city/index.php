<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create') . Yii::t('app', 'City'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute' => 'province_id',
                'value' => function ($model) {
                    return $model->province->name;
                },
                'label' => '所属省份',
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['width' => '70px'],
                'visibleButtons' => [
                    'delete' => function ($model) {
                        return count($model->areas) == 0;
                    }
                ],
            ],
        ],
    ]); ?>

</div>
