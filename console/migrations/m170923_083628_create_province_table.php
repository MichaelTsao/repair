<?php

use yii\db\Migration;

/**
 * Handles the creation of table `province`.
 */
class m170923_083628_create_province_table extends Migration
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

        $this->createTable('province', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->comment('名字'),
            'country_id' => $this->integer()->comment('所属国家'),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('province');
    }
}
