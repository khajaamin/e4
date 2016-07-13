<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\News;

/**
 * NewsSearch represents the model behind the search form about `common\models\News`.
 */
class NewsSearch extends News
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id', 'news_ven_id'], 'integer'],
            [['news_heading', 'news_description', 'news_image', 'news_video', 'news_expiry_date', 'news_verified', 'news_created', 'news_updated', 'deleted'], 'safe'],
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
        $query = News::find();

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
            'news_id' => $this->news_id,
            'news_ven_id' => $this->news_ven_id,
            'news_expiry_date' => $this->news_expiry_date,
            'news_created' => $this->news_created,
            'news_updated' => $this->news_updated,
            'deleted' => 'N',
        ]);

        $query->andFilterWhere(['like', 'news_heading', $this->news_heading])
            ->andFilterWhere(['like', 'news_description', $this->news_description])
            ->andFilterWhere(['like', 'news_image', $this->news_image])
            ->andFilterWhere(['like', 'news_video', $this->news_video])
            ->andFilterWhere(['like', 'news_verified', $this->news_verified])
            ->andFilterWhere(['like', 'deleted', $this->deleted]);

        return $dataProvider;
    }
}
