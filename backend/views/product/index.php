<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create').Yii::t('app', 'Product'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'product_id',
            'name',
            'model',
            [
                'attribute'=>'company_id',
                'value'=>function($data) use ($company_name){
                    return \common\models\Logic::getDictValue($company_name, $data->company_id);
                },
                'filter'=>$company_name,
            ],
            [
                'attribute'=>'status',
                'value'=>function($data){return \common\models\Logic::getDictValue(Yii::$app->params['status'], $data->status);},
                'filter'=>Yii::$app->params['status'],
            ],

            ['class' => 'yii\grid\ActionColumn', 'options'=>['width'=>'70px']],
        ],
    ]); ?>

</div>
