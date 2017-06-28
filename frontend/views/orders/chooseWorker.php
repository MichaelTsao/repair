<?php
/* @var $this yii\web\View */
?>
    <h1>选择工人</h1>
    <br/>
<?php foreach($worker as $one): ?>
    <p onclick="window.location.href='/orders/choose-worker?id=<?= $one->worker_id ?>'">
        <?= \common\models\User::findOne(['uid'=>$one->uid])->name ?>&nbsp;&nbsp;&nbsp;&nbsp;等级:<?= $one->level ?><br/>
        <?= \common\models\Company::findOne(['company_id'=>$one->company_id])->name ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= $one->department ?>
    </p>
    <hr/>
<?php endforeach ?>