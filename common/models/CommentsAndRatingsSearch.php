<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CommentsAndRatings;

/**
 * CommentsAndRatingsSearch represents the model behind the search form about `common\models\CommentsAndRatings`.
 */
class CommentsAndRatingsSearch extends CommentsAndRatings
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cr_id', 'cr_ratings', 'cr_type_id', 'cr_user_id'], 'integer'],
            [['cr_comment', 'cr_type', 'cr_verified', 'cr_created', 'cr_updated', 'deleted'], 'safe'],
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
        $query = CommentsAndRatings::find();

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
            'cr_id' => $this->cr_id,
            'cr_ratings' => $this->cr_ratings,
            'cr_type_id' => $this->cr_type_id,
            'cr_user_id' => $this->cr_user_id,
            'cr_created' => $this->cr_created,
            'cr_updated' => $this->cr_updated,
            'deleted' => 'N',
        ]);

        $query->andFilterWhere(['like', 'cr_comment', $this->cr_comment])
            ->andFilterWhere(['like', 'cr_type', $this->cr_type])
            ->andFilterWhere(['like', 'cr_verified', $this->cr_verified])
            ->andFilterWhere(['like', 'deleted', $this->deleted]);

        return $dataProvider;
    }
}
