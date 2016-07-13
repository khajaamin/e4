<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Enquiries;

/**
 * EnquiriesSearch represents the model behind the search form about `common\models\Enquiries`.
 */
class EnquiriesSearch extends Enquiries
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enq_id', 'enq_user_id', 'enq_ven_id', 'enq_bsc_id'], 'integer'],
            [['enq_name', 'enq_mob', 'enq_email', 'enq_sub', 'enq_comment', 'contacted', 'submited', 'deleted'], 'safe'],
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
        $query = Enquiries::find();

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
            'enq_id' => $this->enq_id,
            'enq_user_id' => $this->enq_user_id,
            'enq_ven_id' => $this->enq_ven_id,
            'enq_bsc_id' => $this->enq_bsc_id,
            'submited' => $this->submited,
        ]);

        $query->andFilterWhere(['like', 'enq_name', $this->enq_name])
            ->andFilterWhere(['like', 'enq_mob', $this->enq_mob])
            ->andFilterWhere(['like', 'enq_email', $this->enq_email])
            ->andFilterWhere(['like', 'enq_sub', $this->enq_sub])
            ->andFilterWhere(['like', 'enq_comment', $this->enq_comment])
            ->andFilterWhere(['like', 'contacted', $this->contacted])
            ->andFilterWhere(['like', 'deleted', $this->deleted]);

        return $dataProvider;
    }
}
