<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique()->comment('用户名'),
            'password' => $this->string()->notNull()->comment('密码'),
            'auth_key' => $this->string(32)->notNull()->comment('Token'),
            'email' => $this->string()->comment('邮件'),
            'name' => $this->string()->comment('名字'),
            'phone' => $this->string()->notNull()->unique()->comment('手机号'),
            'sex' => $this->smallInteger()->comment('性别'),
            'area' => $this->integer()->comment('地区'),
            'position' => "point DEFAULT NULL COMMENT '位置'",
            'icon' => $this->string(200)->comment('头像'),
            'weixin_id' => $this->string(200)->comment('微信OpenID'),

            'status' => $this->smallInteger()->notNull()->defaultValue(1)->comment('状态'),
            'created_at' => $this->integer()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->comment('更新时间'),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
