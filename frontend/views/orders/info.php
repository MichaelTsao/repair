<?php
/**
 * Created by PhpStorm.
 * User: caoxiang
 * Date: 15/11/19
 * Time: 下午12:35
 */
?>
<h1>订单信息</h1>
<br/>
<p>
    用户: &nbsp;<?= $data->user->name ?><br/>
    服务: &nbsp;<?= common\models\Service::findOne(['service_id'=>$data->service_id])->name ?><br/>
    价格: &nbsp;<?= $data->price ?><br/>
    工人: &nbsp;<?= $data->worker->user->name ?><br/>
    状态: &nbsp;<?= Yii::$app->params['order_status'][$data->status] ?><br/>
    创建时间: &nbsp;<?= $data->ctime ?><br/>
    <?php if ($data->accept_time) : ?>
        接单时间: &nbsp;<?= $data->accept_time ?><br/>
    <?php endif ?>
    <?php if ($data->cancel_time) : ?>
        取消时间: &nbsp;<?= $data->cancel_time ?><br/>
    <?php endif ?>
    <?php if ($data->service_time) : ?>
        预约服务时间: &nbsp;<?= $data->service_time ?><br/>
    <?php endif ?>
    <?php if ($data->pay_time) : ?>
        支付时间: &nbsp;<?= $data->pay_time ?><br/>
    <?php endif ?>
    <?php if ($data->finish_time) : ?>
        完成时间: &nbsp;<?= $data->finish_time ?><br/>
    <?php endif ?>
    <?php if ($data->rate) : ?>
        评价: &nbsp;<?= $data->rate ?><br/>
    <?php endif ?>
</p>
<hr/>

<?php if (in_array($data->status, [4])): ?>
    <p>
        <?= \yii\bootstrap\Html::dropDownList('rate', 0, [1,2,3,4,5], ['id'=>'rate', 'class'=>'form-control', 'style'=>'width: 5%']); ?><br/>
        <a class="btn btn-lg btn-primary" href="#" onclick="setComment()">评价</a>
    </p>

    <script type="text/javascript">
        function setComment(){
            var rate = parseInt($('#rate').val()) + 1;
            window.location.href = "/orders/comment?id=<?= $data->order_id ?>&rate="+rate;
        }
    </script>
<?php endif ?>

<?php if (in_array($data->status, [1,2,7])): ?>
    <p><a class="btn btn-lg btn-danger" href="/orders/cancel?id=<?= $data->order_id ?>">取消订单</a></p>
<?php endif ?>

<?php if($data->status == 8):?>
    <p>
        <a class="btn btn-lg btn-success" href="/orders/finish?id=<?= $data->order_id ?>">确认已完成工作</a>
    </p>
<?php endif ?>
