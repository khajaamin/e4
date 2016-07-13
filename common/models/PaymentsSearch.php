<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Payments;

/**
 * PaymentsSearch represents the model behind the search form about `common\models\Payments`.
 */
class PaymentsSearch extends Payments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pmnt_id', 'pmnt_user_id', 'pmnt_amount', 'pmnt_due', 'pmnt_paid'], 'integer'],
            [['pmnt_tag', 'pmnt_description', 'pmnt_mode', 'pmnt_chequeortrans_id', 'pmnt_paid_date', 'pmnt_due_date', 'pmnt_updated', 'pmnt_deleted'], 'safe'],
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
        $query = Payments::find();

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
            'pmnt_id' => $this->pmnt_id,
            'pmnt_user_id' => $this->pmnt_user_id,
            'pmnt_amount' => $this->pmnt_amount,
            'pmnt_due' => $this->pmnt_due,
            'pmnt_paid' => $this->pmnt_paid,
            'pmnt_paid_date' => $this->pmnt_paid_date,
            'pmnt_due_date' => $this->pmnt_due_date,
            'pmnt_updated' => $this->pmnt_updated,
        ]);

        $query->andFilterWhere(['like', 'pmnt_tag', $this->pmnt_tag])
            ->andFilterWhere(['like', 'pmnt_description', $this->pmnt_description])
            ->andFilterWhere(['like', 'pmnt_mode', $this->pmnt_mode])
            ->andFilterWhere(['like', 'pmnt_chequeortrans_id', $this->pmnt_chequeortrans_id])
            ->andFilterWhere(['like', 'pmnt_deleted', $this->pmnt_deleted]);

        return $dataProvider;
    }
}
