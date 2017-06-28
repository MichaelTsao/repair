<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $company_id
 * @property string $name
 * @property integer $status
 * @property string $ctime
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['ctime'], 'safe'],
            [['name'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => '公司ID',
            'name' => '公司名',
            'status' => '状态',
            'ctime' => '创建时间',
        ];
    }

    static function names($has_admin=false){
        if ($has_admin) {
            $name[0] = '管理员';
        }else{
            $name = [];
        }
        $data = static::find()->all();
        foreach ($data as $item) {
            $name[$item->company_id] = $item->name;
        }
        return $name;
    }
}
