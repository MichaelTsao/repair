<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m170923_084201_create_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->comment('名字'),
            'model' => $this->string(200)->comment('型号'),
            'company_id' => $this->integer()->comment('公司'),
            'status' => $this->smallInteger()->defaultValue(1)->comment('状态'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('product');
    }
}
