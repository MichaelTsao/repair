<?php

use yii\db\Migration;

/**
 * Handles the creation of table `company`.
 */
class m170923_084358_create_company_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('company', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->comment('名字'),
            'status' => $this->smallInteger()->defaultValue(1)->comment('状态'),
            'ctime' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->comment('创建时间'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('company');
    }
}
