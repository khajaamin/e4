<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Livevents;

/**
 * LiveventsSearch represents the model behind the search form about `common\models\Livevents`.
 */
class LiveventsSearch extends Livevents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['le_id'], 'integer'],
            [['le_contact_name', 'le_image', 'le_role', 'le_event_category', 'le_event_name', 'le_description', 'le_venue', 'le_city_id', 'le_contacts', 'le_emailid', 'created', 'updated', 'deleted', 'verified', 'paid'], 'safe'],
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
        $query = Livevents::find();

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
            'le_id' => $this->le_id,
            'created' => $this->created,
        ]);

        $query->andFilterWhere(['like', 'le_contact_name', $this->le_contact_name])
            ->andFilterWhere(['like', 'le_image', $this->le_image])
            ->andFilterWhere(['like', 'le_role', $this->le_role])
            ->andFilterWhere(['like', 'le_event_category', $this->le_event_category])
            ->andFilterWhere(['like', 'le_event_name', $this->le_event_name])
            ->andFilterWhere(['like', 'le_description', $this->le_description])
            ->andFilterWhere(['like', 'le_venue', $this->le_venue])
            ->andFilterWhere(['like', 'le_city_id', $this->le_city_id])
            ->andFilterWhere(['like', 'le_contacts', $this->le_contacts])
            ->andFilterWhere(['like', 'le_emailid', $this->le_emailid])
            ->andFilterWhere(['like', 'updated', $this->updated])
            ->andFilterWhere(['like', 'deleted', $this->deleted])
            ->andFilterWhere(['like', 'verified', $this->verified])
            ->andFilterWhere(['like', 'paid', $this->paid]);

        return $dataProvider;
    }
}
