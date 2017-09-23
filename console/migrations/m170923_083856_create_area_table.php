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
        $this->createTable('area', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->comment('名字'),
            'city_id' => $this->integer()->comment('所属城市'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('area');
    }
}
