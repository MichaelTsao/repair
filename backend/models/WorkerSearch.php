<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Worker;

/**
 * WorkerSearch represents the model behind the search form about `common\models\Worker`.
 */
class WorkerSearch extends Worker
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['worker_id', 'uid', 'company_id', 'level'], 'integer'],
            [['department', 'position'], 'safe'],
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
        $query = Worker::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'worker_id' => $this->worker_id,
            'uid' => $this->uid,
            'company_id' => $this->company_id,
            'level' => $this->level,
        ]);
        $query->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'position', $this->position]);
        $query->with('user');
        $query->with('company');

        return $dataProvider;
    }
}
