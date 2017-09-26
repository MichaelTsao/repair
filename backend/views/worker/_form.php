<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Worker */
/* @var $model_user common\models\User */
/* @var $place common\models\Place */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="worker-form">

    <?php $form = ActiveForm::begin(['options' => ['id' => 'worker-form']]); ?>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model_user, 'username')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model_user, 'password_raw')->passwordInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model_user, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model_user, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model_user, 'sex')->dropDownList(Yii::$app->params['sex']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model_user, 'icon_file')->fileInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'company_id')->dropDownList(\common\models\Company::names()) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'department')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($place, 'country')->dropDownList($place->countries, ['onchange' => 'setPlace(1)']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($place, 'province')->dropDownList($place->provinces, ['onchange' => 'setPlace(2)']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($place, 'city')->dropDownList($place->cities, ['onchange' => 'setPlace(3)']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($place, 'area')->dropDownList($place->areas) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'level')->dropDownList(Yii::$app->params['worker_level']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'status')->dropDownList(\common\models\Worker::$statuses) ?>
        </div>
    </div>

    <?= Html::hiddenInput('set-place', 0, ['id' => 'set-place']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    function setPlace(type) {
        $('#set-place').val(type);
        $('#worker-form').submit();
    }
</script>
