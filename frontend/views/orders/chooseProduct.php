<?php
/* @var $this yii\web\View */
?>
    <h1>选择产品</h1>
    <br/>
<?php foreach($product as $one): ?>
    <p onclick="window.location.href='/orders/choose-product?id=<?= $one->product_id ?>'">
        <?= $one->name ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= $one->model ?><br/>
        <?= common\models\Company::findOne(['company_id'=>$one->company_id])->name ?>
    </p>
    <hr/>
<?php endforeach ?>