<?php

use yii\db\Migration;

/**
 * Handles the creation of table `orders`.
 */
class m170923_092520_create_orders_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('orders', [
            'id' => $this->primaryKey(),
            'uid' => $this->integer()->comment('用户'),
            'worker_id' => $this->integer()->comment('工人'),
            'product_id' => $this->integer()->comment('产品'),
            'service_id' => $this->integer()->comment('服务'),
            'price' => $this->integer()->comment('价格'),
            'rate' => $this->smallInteger()->comment('评价'),
            'status' => $this->smallInteger()->defaultValue(1)->comment('状态'),
            'ctime' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->comment('创建时间'),
            'accept_time' => $this->dateTime()->comment('接单时间'),
            'service_time' => $this->dateTime()->comment('服务时间'),
            'start_time' => $this->dateTime()->comment('开始时间'),
            'pay_time' => $this->dateTime()->comment('支付时间'),
            'finish_time' => $this->dateTime()->comment('完成时间'),
            'cancel_time' => $this->dateTime()->comment('取消时间'),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('orders');
    }
}
