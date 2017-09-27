<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $user common\models\User */

$owner = $user ? $user->name . '的' : '';
$this->title = $owner . Yii::t('app', 'Addresses');
if ($user) {
    $this->params['breadcrumbs'][] = ['label' => '用户', 'url' => ['user/index']];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Address'), ['create', 'id' => $user ? $user->id : 0],
            ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => "{update} {delete}",
                'buttons' => [
                    'update' => function ($url, $model) use ($user) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            ['update', 'id' => $model['id'], 'user_id' => $user ? $user->id : 0], [
                                'title' => Yii::t('app', 'Update'),]);
                    },
                    'delete' => function ($url, $model) use ($user) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                            ['delete', 'id' => $model['id'], 'user_id' => $user ? $user->id : 0],
                            [
                                'title' => Yii::t('app', 'Delete'),
                                'data-confirm' => Yii::t('app', 'Are you sure you want to delete this Record?'),
                                'data-method' => 'post'
                            ]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
