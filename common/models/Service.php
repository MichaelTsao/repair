<?php

namespace common\models;

/**
 * This is the model class for table "service".
 *
 * @property integer $id
 * @property string $name
 * @property integer $price
 * @property integer $status
 * @property integer $company_id
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price', 'status', 'company_id'], 'integer'],
            [['name'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '服务ID',
            'name' => '服务名',
            'price' => '价格',
            'status' => '状态',
            'company_id' => '公司',
        ];
    }

    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['service_id' => 'id']);
    }
}
