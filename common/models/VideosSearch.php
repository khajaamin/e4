<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Videos;

/**
 * VideosSearch represents the model behind the search form about `common\models\Videos`.
 */
class VideosSearch extends Videos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vdo_id', 'vdo_user_id', 'vdo_ven_id'], 'integer'],
            [['vdo_url', 'vdo_approved', 'vdo_created', 'vdo_updated', 'deleted'], 'safe'],
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
        $query = Videos::find();

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
            'vdo_id' => $this->vdo_id,
            'vdo_user_id' => $this->vdo_user_id,
            'vdo_ven_id' => $this->vdo_ven_id,
            'vdo_created' => $this->vdo_created,
            'vdo_updated' => $this->vdo_updated,
            'deleted' => 'N',
        ]);

        $query->andFilterWhere(['like', 'vdo_url', $this->vdo_url])
            ->andFilterWhere(['like', 'vdo_approved', $this->vdo_approved])
            ->andFilterWhere(['like', 'deleted', $this->deleted]);

        return $dataProvider;
    }
}
