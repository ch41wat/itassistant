<?php

namespace backend\modules\permission\controllers;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RoleModulePermission;

/**
 * PermissionSearch represents the model behind the search form of `common\models\RoleModulePermission`.
 */
class PermissionSearch extends RoleModulePermission
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'role_id', 'module_id', 'new', 'view', 'save', 'remove'], 'integer'],
            [['added_at', 'added_by'], 'safe'],
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
        $query = RoleModulePermission::find();

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
            'role_id' => $this->role_id,
            'module_id' => $this->module_id,
            'new' => $this->new,
            'view' => $this->view,
            'save' => $this->save,
            'remove' => $this->remove,
            'added_at' => $this->added_at,
        ]);

        $query->andFilterWhere(['like', 'added_by', $this->added_by]);

        return $dataProvider;
    }
}
