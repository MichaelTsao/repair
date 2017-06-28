<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "worker".
 *
 * @property integer $worker_id
 * @property integer $uid
 * @property integer $company_id
 * @property string $department
 * @property integer $level
 * @property string $position
 */
class Worker extends \yii\db\ActiveRecord
{
    public static $status = [0=>'关闭', 1=>'正常', 2=>'待审核'];

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
            [['department'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'worker_id' => '工人ID',
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
        return $this->hasOne(User::className(), ['uid' => 'uid']);
    }

    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['company_id' => 'company_id']);
    }
}
