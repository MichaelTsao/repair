<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Worker */

$this->title = Yii::t('app', 'Create').Yii::t('app', 'Worker');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model_user' => $model_user,
    ]) ?>

</div>
