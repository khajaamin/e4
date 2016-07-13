<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Own;

/**
 * OwnSearch represents the model behind the search form about `common\models\Own`.
 */
class OwnSearch extends Own
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['own_id', 'own_ven_id', 'own_user_id'], 'integer'],
            [['name', 'contact', 'email', 'comment', 'created', 'updated', 'deleted', 'verified'], 'safe'],
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
        $query = Own::find();

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
            'own_id' => $this->own_id,
            'own_ven_id' => $this->own_ven_id,
            'own_user_id' => $this->own_user_id,
            'created' => $this->created,
            'deleted' => 'N',
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'updated', $this->updated])
            ->andFilterWhere(['like', 'deleted', $this->deleted])
            ->andFilterWhere(['like', 'verified', $this->verified]);

        return $dataProvider;
    }
}
