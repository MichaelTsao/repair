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
                    return Yii::$app->params['sex'][$data->sex];
                },
                'filter' => Yii::$app->params['sex'],
            ],
            'area.name',
            'icon',
            'weixin_id',
            [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['width' => '85px'],
                'template' => '{view} {update} {delete} {setWorker}',
                'buttons' => [
                    'setWorker' => function ($url) {
                        return Html::a('', $url, ['class' => 'glyphicon glyphicon-briefcase', 'title' => '创建工人']);
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
