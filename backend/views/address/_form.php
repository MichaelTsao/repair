<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Address */
/* @var $form yii\widgets\ActiveForm */
/* @var $user common\models\User */
?>

<div class="address-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if ($user): ?>
        <?= $form->field($model, 'user_id', ['template' => '{input}'])->hiddenInput(['value' => $user->id]) ?>
    <?php else: ?>
        <?= $form->field($model, 'user_id')->hiddenInput() ?>
    <?php endif ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
