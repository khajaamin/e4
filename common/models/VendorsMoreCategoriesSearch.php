<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\VendorsMoreCategories;

/**
 * VendorsMoreCategoriesSearch represents the model behind the search form about `common\models\VendorsMoreCategories`.
 */
class VendorsMoreCategoriesSearch extends VendorsMoreCategories
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vmc_id', 'ven_id', 'bmc_id', 'bsc_id'], 'integer'],
            [['created', 'deleted', 'vmc_approved'], 'safe'],
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
        $query = VendorsMoreCategories::find();

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
            'vmc_id' => $this->vmc_id,
            'ven_id' => $this->ven_id,
            'bmc_id' => $this->bmc_id,
            'bsc_id' => $this->bsc_id,
            'created' => $this->created,
        ]);

        $query->andFilterWhere(['like', 'deleted', $this->deleted])
            ->andFilterWhere(['like', 'vmc_approved', $this->vmc_approved]);

        return $dataProvider;
    }
}
