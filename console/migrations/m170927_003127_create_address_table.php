<?php

use yii\db\Migration;

/**
 * Handles the creation of table `address`.
 */
class m170927_003127_create_address_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('address', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull()->comment('用户'),
            'name' => $this->string()->notNull()->comment('地址'),
            'ctime' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->comment('创建时间'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('address');
    }
}
