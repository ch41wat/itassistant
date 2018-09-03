<?php

namespace backend\modules\tasks\controllers;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Tasks;

/**
 * TasksSearch represents the model behind the search form of `common\models\Tasks`.
 */
class TasksSearch extends Tasks
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id', 'created_at', 'updated_at'], 'integer'],
            [['task_name', 'type', 'user', 'priority', 'staff', 'status', 'complete_date', 'solution', 'description'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Tasks::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'task_id' => $this->task_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'complete_date' => $this->complete_date,
        ]);

        $query->andFilterWhere(['like', 'task_name', $this->task_name])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'user', $this->user])
            ->andFilterWhere(['like', 'priority', $this->priority])
            ->andFilterWhere(['like', 'staff', $this->staff])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'solution', $this->solution])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
