<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Company;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Accounts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create').Yii::t('app', 'Account'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            //'password',
            [
                'attribute'=>'status',
                'value'=>function($data){return \common\models\Logic::getDictValue(Yii::$app->params['status'], $data->status);},
                'filter'=>Yii::$app->params['status'],
            ],
            [
                'attribute'=>'company_id',
                'value'=>function($data) use ($company_name){
                    return \common\models\Logic::getDictValue($company_name, $data->company_id);
                },
                'filter'=>$company_name,
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
