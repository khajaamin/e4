<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Editbusiness;

/**
 * EditbusinessSearch represents the model behind the search form about `common\models\Editbusiness`.
 */
class EditbusinessSearch extends Editbusiness
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['edit_bui_id', 'edit_ven_id'], 'integer'],
            [['edit_bui_email', 'edit_bui_contact', 'edit_type', 'edit_user_type', 'edit_bui_inaccurate', 'edit_bui_shutdown', 'edit_bui_comment','created', 'updated', 'deleted', 'status'], 'safe'],
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
        $query = Editbusiness::find();

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
            'edit_bui_id' => $this->edit_bui_id,
            'edit_ven_id' => $this->edit_ven_id,
            'deleted' => 'N',
        ]);

        $query->andFilterWhere(['like', 'edit_bui_email', $this->edit_bui_email])
            ->andFilterWhere(['like', 'edit_bui_contact', $this->edit_bui_contact])
            ->andFilterWhere(['like', 'edit_type', $this->edit_type])
            ->andFilterWhere(['like', 'edit_user_type', $this->edit_user_type])
            ->andFilterWhere(['like', 'edit_bui_inaccurate', $this->edit_bui_inaccurate])
            ->andFilterWhere(['like', 'edit_bui_shutdown', $this->edit_bui_shutdown])
            ->andFilterWhere(['like', 'edit_bui_comment', $this->edit_bui_comment])
            ->andFilterWhere(['like', 'deleted', $this->deleted]);

        return $dataProvider;
    }
}
