<?php

use yii\db\Migration;

/**
 * Handles the creation of table `service`.
 */
class m170923_084603_create_service_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('service', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->comment('名字'),
            'price' => $this->integer()->comment('价格'),
            'company_id' => $this->integer()->comment('公司'),
            'status' => $this->smallInteger()->defaultValue(1)->comment('状态'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('service');
    }
}
