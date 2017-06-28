<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Account */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_raw')->passwordInput(['maxlength' => true]) ?>

    <?php if (Yii::$app->user->getIdentity()->company_id == 0): ?>
        <?= $form->field($model, 'company_id')->dropDownList(\common\models\Company::names(true)) ?>
    <?php endif ?>

    <?= $form->field($model, 'status')->dropDownList(Yii::$app->params['status']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
