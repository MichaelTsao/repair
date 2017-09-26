<?php

namespace common\models;

/**
 * This is the model class for table "area".
 *
 * @property integer $id
 * @property string $name
 * @property integer $city_id
 * @property \common\models\City $city
 * @property \common\models\User[] $users
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'area';
    }

    static function names($cityId = -1)
    {
        $query = static::find()->select(['name'])->indexBy('id');
        if ($cityId > -1) {
            $query->where(['city_id' => $cityId]);
        }
        return $query->column();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_id'], 'integer'],
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
            'city_id' => '所属城市',
        ];
    }

    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    public function getUsers()
    {
        return $this->hasMany(User::className(), ['area' => 'id']);
    }
}
