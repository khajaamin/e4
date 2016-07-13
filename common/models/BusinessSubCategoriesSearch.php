<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BusinessSubCategories;

/**
 * BusinessSubCategoriesSearch represents the model behind the search form about `common\models\BusinessSubCategories`.
 */
class BusinessSubCategoriesSearch extends BusinessSubCategories
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bsc_id', 'bmc_id'], 'integer'],
            [['bsc_name', 'bsc_image', 'bsc_description', 'created', 'updated', 'deleted'], 'safe'],
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
        $query = BusinessSubCategories::find();

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
            'bsc_id' => $this->bsc_id,
            'bmc_id' => $this->bmc_id,
            'created' => $this->created,
            'updated' => $this->updated,
        ]);

        $query->andFilterWhere(['like', 'bsc_name', $this->bsc_name])
            ->andFilterWhere(['like', 'bsc_image', $this->bsc_image])
            ->andFilterWhere(['like', 'bsc_description', $this->bsc_description])
            ->andFilterWhere(['like', 'deleted', $this->deleted]);

        return $dataProvider;
    }
}
