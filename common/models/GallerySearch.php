<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Gallery;

/**
 * GallerySearch represents the model behind the search form about `common\models\Gallery`.
 */
class GallerySearch extends Gallery
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gallery_id', 'gallery_user_id', 'gallery_ven_id'], 'integer'],
            [['gallery_image', 'gallery_approved', 'gallery_created', 'gallery_updated', 'deleted'], 'safe'],
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
        $query = Gallery::find();

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
            'gallery_id' => $this->gallery_id,
            'gallery_user_id' => $this->gallery_user_id,
            'gallery_ven_id' => $this->gallery_ven_id,
            'gallery_created' => $this->gallery_created,
            'gallery_updated' => $this->gallery_updated,
            'deleted' => 'N',
        ]);

        $query->andFilterWhere(['like', 'gallery_image', $this->gallery_image])
            ->andFilterWhere(['like', 'gallery_approved', $this->gallery_approved])
            ->andFilterWhere(['like', 'deleted', $this->deleted]);

        return $dataProvider;
    }
}
