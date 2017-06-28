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
    服务: &nbsp;<?= \common\models\Service::findOne(['service_id'=>$data->service_id])->name ?><br/>
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

<?php if($data->status == 1):?>
<p>
    <a class="btn btn-lg btn-success" href="/worker/accept?id=<?= $data->order_id ?>">接单</a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a class="btn btn-lg btn-danger" href="/worker/refuse?id=<?= $data->order_id ?>">拒单</a>
</p>
<?php endif ?>

<?php if($data->status == 7):?>
    <p>
        <b>请在 <?=$data->service_time ?> 完成工作.</b>
        <br/><br/>
        <a class="btn btn-lg btn-success" href="/worker/start?id=<?= $data->order_id ?>">开始服务</a>
    </p>
<?php endif ?>

<?php if($data->status == 5):?>
    <p>
        <a class="btn btn-lg btn-success" href="/worker/has-pay?id=<?= $data->order_id ?>">确认用户支付</a>
    </p>
<?php endif ?>

<?php if ($data->status == 2): ?>
    服务时间:
    <?= dosamigos\datetimepicker\DateTimePicker::widget([
        'id' => 'service_time',
        'name' => 'service_time',
        'language' => 'zh-CN',
        'size' => 'ms',
        'pickButtonIcon' => 'glyphicon glyphicon-calendar',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd HH:ii',
            'todayBtn' => true
        ]
    ]);?>
    <br/><br/>
    <p>
        <a class="btn btn-lg btn-success" href="#" onclick="setTime()">确认服务时间</a>
    </p>

    <script type="text/javascript">
        function setTime(){
            var time = $('#service_time').val();
            window.location.href = "/worker/set-service-time?id=<?= $data->order_id ?>&time="+time;
        }
    </script>
<?php endif; ?>
