<?php

namespace backend\modules\licenses\controllers;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Licenses;

/**
 * LicensesSearch represents the model behind the search form of `common\models\Licenses`.
 */
class LicensesSearch extends Licenses
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'seats', 'user_id', 'supplier_id'], 'integer'],
            [['name', 'version', 'categories', 'serial', 'purchase_date', 'order_number', 'description', 'image', 'expiration_date'], 'safe'],
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
        $query = Licenses::find();

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
            'purchase_date' => $this->purchase_date,
            'purchase_cost' => $this->purchase_cost,
            'seats' => $this->seats,
            'user_id' => $this->user_id,
            'supplier_id' => $this->supplier_id,
            'expiration_date' => $this->expiration_date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'version', $this->version])
            ->andFilterWhere(['like', 'categories', $this->categories])
            ->andFilterWhere(['like', 'serial', $this->serial])
            ->andFilterWhere(['like', 'order_number', $this->order_number])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
