<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BusinessMainCategories;

/**
 * BusinessMainCategoriesSearch represents the model behind the search form about `common\models\BusinessMainCategories`.
 */
class BusinessMainCategoriesSearch extends BusinessMainCategories
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bmc_id'], 'integer'],
            [['bmc_name', 'bmc_image', 'bmc_description', 'created', 'updated', 'deleted'], 'safe'],
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
        $query = BusinessMainCategories::find();

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
            'bmc_id' => $this->bmc_id,
            'created' => $this->created,
            'updated' => $this->updated,
        ]);

        $query->andFilterWhere(['like', 'bmc_name', $this->bmc_name])
            ->andFilterWhere(['like', 'bmc_image', $this->bmc_image])
            ->andFilterWhere(['like', 'bmc_description', $this->bmc_description])
            ->andFilterWhere(['like', 'deleted', $this->deleted]);

        return $dataProvider;
    }
}
