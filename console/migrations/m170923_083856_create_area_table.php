<?php

use yii\db\Migration;

/**
 * Handles the creation of table `area`.
 */
class m170923_083856_create_area_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('area', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->comment('名字'),
            'city_id' => $this->integer()->comment('所属城市'),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('area');
    }
}
