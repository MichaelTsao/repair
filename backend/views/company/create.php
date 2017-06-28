<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Company */

$this->title = Yii::t('app', 'Create').Yii::t('app', 'Company');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Companies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
