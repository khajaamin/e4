<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Vendors;

/**
 * VendorsSearch represents the model behind the search form about `common\models\Vendors`.
 */
class VendorsSearch extends Vendors
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ven_id', 'ven_main_category_id', 'ven_sub_category_id', 'ven_noof_emp', 'ven_country_id', 'ven_state_id', 'ven_city_id', 'ven_location_id', 'ven_zip', 'ven_contact_person_id'], 'integer'],
            [['ven_company_name', 'ven_services_offered', 'ven_business_logo', 'ven_company_descr', 'ven_established_date', 'ven_branches_loc', 'ven_market_area', 'ven_website', 'ven_specialized_in', 'ven_contact_no','ven_country_code', 'ven_email_id', 'ven_address', 'ven_verified', 'created', 'updated', 'deleted'], 'safe'],
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
        $query = Vendors::find();

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
            'ven_id' => $this->ven_id,
            'ven_main_category_id' => $this->ven_main_category_id,
            'ven_sub_category_id' => $this->ven_sub_category_id,
            'ven_established_date' => $this->ven_established_date,
            'ven_noof_emp' => $this->ven_noof_emp,
            'ven_country_id' => $this->ven_country_id,
            'ven_country_code' => $this->ven_country_code,
            'ven_state_id' => $this->ven_state_id,
            'ven_city_id' => $this->ven_city_id,
            'ven_location_id' => $this->ven_location_id,
            'ven_zip' => $this->ven_zip,
            'ven_contact_person_id' => $this->ven_contact_person_id,
            'created' => $this->created,
            'updated' => $this->updated,
            'deleted' => 'N',
        ]);

        $query->andFilterWhere(['like', 'ven_company_name', $this->ven_company_name])
            ->andFilterWhere(['like', 'ven_services_offered', $this->ven_services_offered])
            ->andFilterWhere(['like', 'ven_business_logo', $this->ven_business_logo])
            ->andFilterWhere(['like', 'ven_company_descr', $this->ven_company_descr])
            ->andFilterWhere(['like', 'ven_branches_loc', $this->ven_branches_loc])
            ->andFilterWhere(['like', 'ven_market_area', $this->ven_market_area])
            ->andFilterWhere(['like', 'ven_website', $this->ven_website])
            ->andFilterWhere(['like', 'ven_specialized_in', $this->ven_specialized_in])
            ->andFilterWhere(['like', 'ven_contact_no', $this->ven_contact_no])
             ->andFilterWhere(['like', 'ven_country_code', $this->ven_country_code])
            ->andFilterWhere(['like', 'ven_email_id', $this->ven_email_id])
            ->andFilterWhere(['like', 'ven_address', $this->ven_address])
            ->andFilterWhere(['like', 'ven_verified', $this->ven_verified])
            ->andFilterWhere(['like', 'ven_deleted', $this->deleted]);

        return $dataProvider;
    }
}
