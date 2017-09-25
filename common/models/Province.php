<?php

namespace common\models;

/**
 * This is the model class for table "province".
 *
 * @property integer $id
 * @property string $name
 * @property integer $country_id
 * @property \common\models\Country $country
 * @property \common\models\City[] $cities
 */
class Province extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'province';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id'], 'integer'],
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
            'country_id' => '所属国家',
        ];
    }

    public static function names()
    {
        return static::find()->select(['name'])->indexBy('id')->column();
    }

    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    public function getCities()
    {
        return $this->hasMany(City::className(), ['province_id' => 'id']);
    }
}
