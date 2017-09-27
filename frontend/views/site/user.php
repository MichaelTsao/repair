<?php

/* @var $this yii\web\View */

/* @var $user common\models\User */

/* @var $place common\models\Place */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = '用户中心';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'user-form']); ?>

            <?= $form->field($user, 'name') ?>
            <?= $form->field($user, 'password_raw')->passwordInput() ?>
            <?= $form->field($user, 'phone') ?>
            <?= $form->field($user, 'email') ?>
            <?= $form->field($user, 'sex')->dropDownList(Yii::$app->params['sex']) ?>
            <?= $form->field($user, 'icon_file')->fileInput() ?>
            <?= $form->field($place, 'country')->dropDownList($place->countries, ['onchange' => 'setPlace(1)']) ?>
            <?= $form->field($place, 'province')->dropDownList($place->provinces, ['onchange' => 'setPlace(2)']) ?>
            <?= $form->field($place, 'city')->dropDownList($place->cities, ['onchange' => 'setPlace(3)']) ?>
            <?= $form->field($place, 'area')->dropDownList($place->areas) ?>
            <?= Html::hiddenInput('set-place', 0, ['id' => 'set-place']); ?>

            <div class="form-group">
                <?= Html::submitButton('修改', ['class' => 'btn btn-primary', 'name' => 'user-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>

<script>
    function setPlace(type) {
        $('#set-place').val(type);
        $('#user-form').submit();
    }
</script>