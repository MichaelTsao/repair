<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create') . Yii::t('app', 'User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'username',
            'name',
            'email',
            'phone',
            [
                'attribute' => 'sex',
                'value' => function ($data) {
                    return isset(Yii::$app->params['sex'][$data->sex]) ? Yii::$app->params['sex'][$data->sex] : '未设置';
                },
                'filter' => Yii::$app->params['sex'],
            ],
            [
                'attribute' => 'areaInfo.name',
                'label' => '地区',
            ],
            [
                'attribute' => 'icon',
                'value' => function ($model) {
                    return $model->icon;
                },
            ],
            'weixin_id',
            [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['width' => '90'],
                'template' => '{view} {update} {delete} {setAddress}',
                'buttons' => [
                    'setWorker' => function ($url) {
                        return Html::a('', $url, ['class' => 'glyphicon glyphicon-briefcase', 'title' => '创建工人']);
                    },
                    'setAddress' => function ($url, $model) {
                        return Html::a('', \yii\helpers\Url::to(['address/index', 'id' => $model->id]),
                            ['class' => 'glyphicon glyphicon-home', 'title' => '设置地址']);
                    }
                ],
                'visibleButtons' => [
                    'delete' => function ($model) {
                        return count($model->orders) == 0 && !$model->worker;
                    }
                ],
            ],
        ],
    ]); ?>

</div>
