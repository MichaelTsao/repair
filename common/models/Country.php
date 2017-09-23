<?php

namespace common\models;

/**
 * This is the model class for table "country".
 *
 * @property integer $id
 * @property string $name
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '国家ID',
            'name' => '名字',
        ];
    }

    public static function names()
    {
        return static::find()->select(['name'])->indexBy('id')->column();
    }

    public function getProvinces()
    {
        return $this->hasMany(Province::className(), ['country_id' => 'id']);
    }
}
