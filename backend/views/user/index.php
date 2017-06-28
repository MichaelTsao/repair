<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
        <?= Html::a(Yii::t('app', 'Create').Yii::t('app', 'User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'uid',
            'username',
            'name',
            'email',
            'phone',
            [
                'attribute'=>'sex',
                'value'=>function($data){
                    return Yii::$app->params['sex'][$data->sex];
                },
                'filter'=>Yii::$app->params['sex'],
            ],
            'citys.name',
            'icon',
            'weixin_id',
            [
                'class' => 'yii\grid\ActionColumn',
                'options'=>['width'=>'85px'],
                'template' => '{view} {update} {delete} {setWorker}',
                'buttons' => [
                    'setWorker' => function ($url, $model, $key) {
                        return Html::a('', $url, ['class'=>'glyphicon glyphicon-briefcase', 'title'=>'创建工人']);
                    }
                ],
            ],
        ],
    ]); ?>

</div>
