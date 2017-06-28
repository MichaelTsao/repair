<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $order_id
 * @property integer $uid
 * @property integer $worker_id
 * @property integer $product_id
 * @property integer $service_id
 * @property integer $price
 * @property integer $rate
 * @property integer $status
 * @property string $ctime
 * @property string $accept_time
 * @property string $pay_time
 * @property string $finish_time
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'worker_id', 'product_id', 'service_id', 'price', 'rate', 'status'], 'integer'],
            [['ctime', 'accept_time', 'pay_time', 'finish_time', 'service_time', 'cancel_time', 'start_time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => '订单ID',
            'uid' => '用户',
            'worker_id' => '工人',
            'product_id' => '产品',
            'service_id' => '服务',
            'price' => '价格',
            'rate' => '评价',
            'status' => '状态',
            'ctime' => '创建时间',
            'accept_time' => '接单时间',
            'service_time' => '服务时间',
            'start_time' => '开始服务时间',
            'pay_time' => '支付时间',
            'finish_time' => '完成时间',
            'cancel_time' => '取消时间',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['uid' => 'uid']);
    }

    public function getWorker()
    {
        return $this->hasOne(Worker::className(), ['worker_id' => 'worker_id']);
    }

    public function getService()
    {
        return $this->hasOne(Service::className(), ['service_id' => 'service_id']);
    }
}
