<?php

namespace common\models;

/**
 * This is the model class for table "city".
 *
 * @property integer $id
 * @property string $name
 * @property integer $province_id
 * @property \common\models\Province $province
 * @property \common\models\Area[] $areas
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['province_id'], 'integer'],
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
            'province_id' => '所属省份',
        ];
    }

    public static function names($provinceId = -1)
    {
        $query = static::find()->select(['name'])->indexBy('id');
        if ($provinceId > -1) {
            $query->where(['province_id' => $provinceId]);
        }
        return $query->column();
    }

    public function getProvince()
    {
        return $this->hasOne(Province::className(), ['id' => 'province_id']);
    }

    public function getAreas()
    {
        return $this->hasMany(Area::className(), ['city_id' => 'id']);
    }
}