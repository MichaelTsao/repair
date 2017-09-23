<?php

namespace common\models;

/**
 * This is the model class for table "company".
 *
 * @property integer $id
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
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名字',
            'status' => '状态',
            'ctime' => '创建时间',
        ];
    }

    static function names($has_admin = false)
    {
        $c = static::find()->select(['name'])->indexBy('id')->column();
        if ($has_admin) {
            array_unshift($c, '管理员');
        }
        return $c;
    }
}
