<?php

namespace common\models;

/**
 * This is the model class for table "worker".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $company_id
 * @property string $department
 * @property integer $level
 * @property string $position
 * @property integer $status
 * @property \common\models\User $user
 * @property \common\models\Company $company
 * @property \common\models\Orders[] $orders
 */
class Worker extends \yii\db\ActiveRecord
{
    public static $statuses = [0 => '关闭', 1 => '正常', 2 => '待审核'];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'worker';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'company_id', 'level', 'status'], 'integer'],
            [['position'], 'string'],
            [['department'], 'string', 'max' => 200],
            [['uid'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '工人ID',
            'uid' => '用户ID',
            'company_id' => '公司',
            'department' => '部门',
            'level' => '等级',
            'status' => '状态',
            'position' => '位置',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'uid']);
    }

    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['worker_id' => 'id']);
    }
}
