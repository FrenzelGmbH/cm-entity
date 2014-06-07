<?php

namespace frenzelgmbh\cmentity\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frenzelgmbh\cmentity\models\Entity;

/**
 * EntitySearch represents the model behind the search form about `app\modules\categories\models\Entity`.
 */
class EntitySearch extends Entity
{
    public function rules()
    {
        return [
            [['id', 'user_id', 'mod_id', 'system_upate', 'created_at', 'updated_at', 'deleted_at', 'entity_type_id', 'entity_relation_id'], 'integer'],
            [['name', 'prename', 'name_two', 'name_three', 'official_one', 'official_two', 'param_date', 'param_text', 'mod_table', 'system_key', 'system_name'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Entity::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'param_date' => $this->param_date,
            'user_id' => $this->user_id,
            'mod_id' => $this->mod_id,
            'system_upate' => $this->system_upate,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'entity_type_id' => $this->entity_type_id,
            'entity_relation_id' => $this->entity_relation_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'prename', $this->prename])
            ->andFilterWhere(['like', 'name_two', $this->name_two])
            ->andFilterWhere(['like', 'name_three', $this->name_three])
            ->andFilterWhere(['like', 'official_one', $this->official_one])
            ->andFilterWhere(['like', 'official_two', $this->official_two])
            ->andFilterWhere(['like', 'param_text', $this->param_text])
            ->andFilterWhere(['like', 'mod_table', $this->mod_table])
            ->andFilterWhere(['like', 'system_key', $this->system_key])
            ->andFilterWhere(['like', 'system_name', $this->system_name]);

        return $dataProvider;
    }
}
