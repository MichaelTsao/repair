<?php

use yii\db\Migration;

/**
 * Handles adding address to table `company`.
 */
class m170925_133141_add_address_column_to_company_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('company', 'address', $this->string()->after('name')->comment('地址'));
        $this->addColumn('company', 'phone', $this->string()->after('address')->comment('电话'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('company', 'address');
        $this->dropColumn('company', 'phone');
    }
}
