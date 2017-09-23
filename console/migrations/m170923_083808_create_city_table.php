<?php

use yii\db\Migration;

/**
 * Handles the creation of table `city`.
 */
class m170923_083808_create_city_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('city', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->comment('名字'),
            'province_id' => $this->integer()->comment('所属省份'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('city');
    }
}
