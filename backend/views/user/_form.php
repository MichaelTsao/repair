<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $place common\models\Place */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id' => 'user-form']]); ?>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'password_raw')->passwordInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-1">
            <?= $form->field($model, 'sex')->dropDownList(Yii::$app->params['sex']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($place, 'country')->dropDownList($place->countries, ['onchange' => 'setPlace(1)']) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($place, 'province')->dropDownList($place->provinces, ['onchange' => 'setPlace(2)']) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($place, 'city')->dropDownList($place->cities, ['onchange' => 'setPlace(3)']) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($place, 'area')->dropDownList($place->areas) ?>
        </div>
    </div>

    <?= $form->field($model, 'icon_file')->fileInput() ?>

    <?= Html::hiddenInput('set-place', 0, ['id' => 'set-place']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    function setPlace(type) {
        $('#set-place').val(type);
        $('#user-form').submit();
    }
</script>
