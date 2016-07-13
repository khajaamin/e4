<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Complaints;

/**
 * ComplaintsSearch represents the model behind the search form about `common\models\Complaints`.
 */
class ComplaintsSearch extends Complaints
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comp_id', 'comp_user_id', 'comp_vendor_id'], 'integer'],
            [['comp_tag', 'comp_description', 'comp_image', 'comp_video', 'comp_audio', 'comp_status', 'comp_comment', 'comp_created', 'comp_updated', 'com_deleted'], 'safe'],
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
        $query = Complaints::find();

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
            'comp_id' => $this->comp_id,
            'comp_user_id' => $this->comp_user_id,
            'comp_vendor_id' => $this->comp_vendor_id,
            'comp_created' => $this->comp_created,
            'comp_updated' => $this->comp_updated,
            'com_deleted' => 'N',
        ]);

        $query->andFilterWhere(['like', 'comp_tag', $this->comp_tag])
            ->andFilterWhere(['like', 'comp_description', $this->comp_description])
            ->andFilterWhere(['like', 'comp_image', $this->comp_image])
            ->andFilterWhere(['like', 'comp_video', $this->comp_video])
            ->andFilterWhere(['like', 'comp_audio', $this->comp_audio])
            ->andFilterWhere(['like', 'comp_status', $this->comp_status])
            ->andFilterWhere(['like', 'comp_comment', $this->comp_comment])
            ->andFilterWhere(['like', 'com_deleted', $this->com_deleted]);

        return $dataProvider;
    }
}
