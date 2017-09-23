<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Worker */
/* @var $model_user common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="worker-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model_user, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model_user, 'password_raw')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model_user, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model_user, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model_user, 'sex')->dropDownList(Yii::$app->params['sex']) ?>

    <?= $form->field($model_user, 'area')->dropDownList(\common\models\Area::names()) ?>

    <?= $form->field($model_user, 'icon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_id')->dropDownList(\common\models\Company::names()) ?>

    <?= $form->field($model, 'department')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'level')->dropDownList(Yii::$app->params['worker_level']) ?>

    <?= $form->field($model, 'status')->dropDownList(\common\models\Worker::$statuses) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
