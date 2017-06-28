<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Orders;
use common\models\Service;

/**
 * OrdersSearch represents the model behind the search form about `common\models\Orders`.
 */
class OrdersSearch extends Orders
{
    public $companyId;

    public function attributes()
    {
        return array_merge(parent::attributes(), ['user.name', 'worker.user.name', 'company_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'uid', 'worker_id', 'product_id', 'service_id', 'price', 'status'], 'integer'],
            [['ctime', 'accept_time', 'pay_time', 'finish_time', 'user.name', 'worker.user.name', 'company_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Orders::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['user.name'] = [
            'asc' => ['user.name' => SORT_ASC],
            'desc' => ['user.name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['worker.user.name'] = [
            'asc' => ['user.name' => SORT_ASC],
            'desc' => ['user.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'order_id' => $this->order_id,
            'uid' => $this->uid,
            'worker_id' => $this->worker_id,
            'product_id' => $this->product_id,
            'service_id' => $this->service_id,
            'price' => $this->price,
            'status' => $this->status,
            'ctime' => $this->ctime,
            'accept_time' => $this->accept_time,
            'pay_time' => $this->pay_time,
            'finish_time' => $this->finish_time,
        ]);
        $query->joinWith('user');
        $query->joinWith('worker');
        $query->joinWith('service');
        $query->andFilterWhere(['like','user.name',$this->getAttribute('user.name')]);
        $query->andFilterWhere(['like','worker.user.name',$this->getAttribute('worker.user.name')]);

        if ($this->companyId) {
            $query->andFilterWhere(['service.service_id' => array_keys(\yii\helpers\ArrayHelper::map(Service::findAll(['company_id'=>$this->companyId]), 'service_id', 'name'))]);
        }

        return $dataProvider;
    }
}
