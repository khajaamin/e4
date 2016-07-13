<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Blog;

/**
 * BlogSearch represents the model behind the search form about `common\models\Blog`.
 */
class BlogSearch extends Blog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['blog_id', 'blog_user_id','bmc_id','bsc_id'], 'integer'],
            [['blog_tag', 'blog_heading', 'blog_content', 'blog_image', 'blog_video', 'blog_audio', 'blog_created', 'blog_updated', 'deleted', 'blog_verified'], 'safe'],
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
        $query = Blog::find();

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
            'blog_id' => $this->blog_id,
            'blog_user_id' => $this->blog_user_id,
            'blog_created' => $this->blog_created,
            'blog_updated' => $this->blog_updated,
            'deleted' => 'N',
        ]);

        $query->andFilterWhere(['like', 'blog_tag', $this->blog_tag])
            ->andFilterWhere(['like', 'bmc_id', $this->bmc_id])
            ->andFilterWhere(['like', 'bsc_id', $this->bsc_id])
            ->andFilterWhere(['like', 'blog_heading', $this->blog_heading])
            ->andFilterWhere(['like', 'blog_content', $this->blog_content])
            ->andFilterWhere(['like', 'blog_image', $this->blog_image])
            ->andFilterWhere(['like', 'blog_video', $this->blog_video])
            ->andFilterWhere(['like', 'blog_audio', $this->blog_audio])
            ->andFilterWhere(['like', 'deleted', $this->deleted])
            ->andFilterWhere(['like', 'blog_verified', $this->blog_verified]);

        return $dataProvider;
    }
}
