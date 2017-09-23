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
        $this->createTable('province', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->comment('名字'),
            'country_id' => $this->integer()->comment('所属国家'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('province');
    }
}
