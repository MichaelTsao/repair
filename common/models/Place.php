<?php
/**
 * Created by PhpStorm.
 * User: caoxiang
 * Date: 2017/9/26
 * Time: 下午12:14
 */

namespace common\models;

use yii\base\Model;

/**
 * Class Place
 * @package common\models
 *
 * @property integer $country;
 * @property integer $province;
 * @property integer $city;
 * @property integer $area;
 *
 * @property array $countries;
 * @property array $provinces;
 * @property array $cities;
 * @property array $areas;
 */
class Place extends Model
{
    const SCENARIO_COUNTRY = 1;
    const SCENARIO_PROVINCE = 2;
    const SCENARIO_CITY = 3;

    protected $countryId;
    protected $provinceId;
    protected $cityId;
    protected $areaId;

    /**
     * @param $user \common\models\User
     * @return \common\models\Place
     */
    public static function create($user)
    {
        $config = [];
        if ($user->area) {
            $config = [
                'country' => $user->areaInfo->city->province->country_id,
                'province' => $user->areaInfo->city->province_id,
                'city' => $user->areaInfo->city_id,
                'area' => $user->area,
            ];
        }
        return new static($config);
    }

    public function rules()
    {
        return [
            [['country', 'province', 'city', 'area'], 'safe'],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_COUNTRY] = ['country'];
        $scenarios[self::SCENARIO_PROVINCE] = ['country', 'province'];
        $scenarios[self::SCENARIO_CITY] = ['country', 'province', 'city'];
        return $scenarios;
    }

    public function setCountry($id)
    {
        $this->countryId = $id;
    }

    public function getCountry()
    {
        return $this->countryId ? $this->countryId : $this->firstOrZero($this->countries);
    }

    protected function firstOrZero($dict)
    {
        return $dict ? array_keys($dict)[0] : 0;
    }

    public function getCountries()
    {
        return Country::names();
    }

    public function setProvince($id)
    {
        $this->provinceId = $id;
    }

    public function getProvince()
    {
        return $this->provinceId ? $this->provinceId : $this->firstOrZero($this->provinces);
    }

    public function getProvinces()
    {
        return Province::names($this->country);
    }

    public function setCity($id)
    {
        $this->cityId = $id;
    }

    public function getCity()
    {
        return $this->cityId ? $this->cityId : $this->firstOrZero($this->cities);
    }

    public function getCities()
    {
        return City::names($this->province);
    }

    public function setArea($id)
    {
        $this->areaId = $id;
    }

    public function getArea()
    {
        return $this->areaId ? $this->areaId : $this->firstOrZero($this->areas);
    }

    public function getAreas()
    {
        return Area::names($this->city);
    }

    public function attributeLabels()
    {
        return [
            'country' => '国家',
            'province' => '省份',
            'city' => '城市',
            'area' => '地区',
        ];
    }
}