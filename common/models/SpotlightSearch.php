<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Spotlight;

/**
 * SpotlightSearch represents the model behind the search form about `common\models\Spotlight`.
 */
class SpotlightSearch extends Spotlight
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['spotlt_id', 'spotlt_ven_id'], 'integer'],
            [['spotlt_heading', 'spotlt_description', 'spotlt_image', 'spotlt_video', 'spotlt_expery_date', 'spotlt_verified', 'spotlt_created', 'spotlt_updated', 'spotlt_deleted'], 'safe'],
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
        $query = Spotlight::find();

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
            'spotlt_id' => $this->spotlt_id,
            'spotlt_ven_id' => $this->spotlt_ven_id,
            'spotlt_expery_date' => $this->spotlt_expery_date,
            'spotlt_created' => $this->spotlt_created,
            'spotlt_updated' => $this->spotlt_updated,
            'spotlt_deleted' => 'N',
        ]);

        $query->andFilterWhere(['like', 'spotlt_heading', $this->spotlt_heading])
            ->andFilterWhere(['like', 'spotlt_description', $this->spotlt_description])
            ->andFilterWhere(['like', 'spotlt_image', $this->spotlt_image])
            ->andFilterWhere(['like', 'spotlt_video', $this->spotlt_video])
            ->andFilterWhere(['like', 'spotlt_verified', $this->spotlt_verified])
            ->andFilterWhere(['like', 'spotlt_deleted', $this->spotlt_deleted]);

        return $dataProvider;
    }
}
