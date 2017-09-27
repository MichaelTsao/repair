<?php

use yii\db\Migration;

/**
 * Handles the creation of table `worker`.
 */
class m170923_084900_create_worker_table extends Migration
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

        $this->createTable('worker', [
            'id' => $this->primaryKey(),
            'uid' => $this->integer()->comment('用户'),
            'company_id' => $this->integer()->comment('公司'),
            'department' => $this->string(200)->comment('部门'),
            'level' => $this->smallInteger()->defaultValue(0)->comment('等级'),
            'position' => "point DEFAULT NULL COMMENT '位置'",
            'status' => $this->smallInteger()->defaultValue(1)->comment('状态'),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('worker');
    }
}
