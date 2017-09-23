<?php

use yii\db\Migration;

/**
 * Handles the creation of table `account`.
 */
class m170923_083137_create_account_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('account', [
            'id' => $this->primaryKey(),
            'username' => $this->string(200)->comment('用户名'),
            'password' => $this->string(200)->comment('密码'),
            'status' => $this->smallInteger()->defaultValue(1)->comment('状态'),
            'company_id' => $this->integer()->comment('所属公司'),
            'auth_key' => $this->string(200)->comment('Token'),
            'ctime' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->comment('创建时间'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('account');
    }
}
