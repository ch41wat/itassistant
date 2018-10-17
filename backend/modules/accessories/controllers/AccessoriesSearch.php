<?php

namespace backend\modules\accessories\controllers;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Accessories;

/**
 * AccessoriesSearch represents the model behind the search form of `common\models\Accessories`.
 */
class AccessoriesSearch extends Accessories
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'qty', 'supplier_id'], 'integer'],
            [['name', 'purchase_date', 'order_number', 'model', 'image'], 'safe'],
            [['purchase_cost'], 'number'],
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
        $query = Accessories::find();

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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'qty' => $this->qty,
            'purchase_date' => $this->purchase_date,
            'purchase_cost' => $this->purchase_cost,
            'supplier_id' => $this->supplier_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'order_number', $this->order_number])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
