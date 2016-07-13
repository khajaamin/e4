<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Latestpost;

/**
 * LatestpostSearch represents the model behind the search form about `common\models\Latestpost`.
 */
class LatestpostSearch extends Latestpost
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['latest_post_id', 'latest_post_ven_id'], 'integer'],
            [['latest_post_heading', 'latest_post_description', 'latest_post_image', 'latest_post_video', 'latest_post_expery_date', 'latest_post_verified', 'latest_post_created', 'latest_post_updated', 'latest_post_deleted'], 'safe'],
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
        $query = Latestpost::find();

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
            'latest_post_id' => $this->latest_post_id,
            'latest_post_ven_id' => $this->latest_post_ven_id,
            'latest_post_expery_date' => $this->latest_post_expery_date,
            'latest_post_created' => $this->latest_post_created,
            'latest_post_updated' => $this->latest_post_updated,
            'latest_post_deleted' => 'N',
        ]);

        $query->andFilterWhere(['like', 'latest_post_heading', $this->latest_post_heading])
            ->andFilterWhere(['like', 'latest_post_description', $this->latest_post_description])
            ->andFilterWhere(['like', 'latest_post_image', $this->latest_post_image])
            ->andFilterWhere(['like', 'latest_post_video', $this->latest_post_video])
            ->andFilterWhere(['like', 'latest_post_verified', $this->latest_post_verified])
            ->andFilterWhere(['like', 'latest_post_deleted', $this->latest_post_deleted]);

        return $dataProvider;
    }
}
