<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $place common\models\Place */

$this->title = Yii::t('app', 'Create').Yii::t('app', 'User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'place' => $place,
    ]) ?>

</div>
