<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $news_id
 * @property string $news_heading
 * @property string $news_description
 * @property string $news_image
 * @property string $news_video
 * @property integer $news_ven_id
 * @property string $news_expiry_date
 * @property string $news_verified
 * @property string $news_created
 * @property string $news_updated
 * @property string $deleted
 */
class News extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_heading', 'news_description', 'news_ven_id', 'news_expiry_date'], 'required'],
            [['news_ven_id'], 'integer'],
            [['news_expiry_date', 'news_created', 'news_updated'], 'safe'],
            [['news_verified', 'deleted'], 'string'],
            [['news_heading', 'news_image', 'news_video'], 'string'],
            [['file'],'safe'],
            [['file'],'file', 'extensions' => 'jpg, gif, png'],
            [['news_description'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'news_id' => Yii::t('app', 'News Id'),
            'news_heading' => Yii::t('app', 'Heading'),
            'news_description' => Yii::t('app', 'Description'),
            'file' => Yii::t('app', 'Image'),
            'news_video' => Yii::t('app', 'Video Url'),
            'news_ven_id' => Yii::t('app', 'Vendor Id'),
            'news_expiry_date' => Yii::t('app', 'News Expiry Date'),
            'news_verified' => Yii::t('app', 'Verified'),
            'news_created' => Yii::t('app', 'Created'),
            'news_updated' => Yii::t('app', 'Updated'),
            'deleted' => Yii::t('app', 'Deleted'),
        ];
    }

    /**
     * @inheritdoc
     * @return NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }
}
