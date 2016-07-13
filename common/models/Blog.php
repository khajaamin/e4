<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "blog".
 *
 * @property integer $blog_id
 * @property string $blog_tag
 * @property string $blog_heading
 * @property string $blog_content
 * @property string $blog_image
 * @property string $blog_video
 * @property string $blog_audio
 * @property integer $blog_user_id
 * @property string $blog_created
 * @property string $blog_updated
 * @property string $deleted
 * @property string $blog_verified
 */
class Blog extends \yii\db\ActiveRecord
{
     public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['blog_tag','bmc_id','blog_heading', 'blog_content', 'blog_image','blog_user_id'], 'required'],
            [['blog_user_id','bmc_id','bsc_id'], 'integer'],
            [['blog_created', 'blog_updated'], 'safe'],
            [['deleted', 'blog_verified', 'blog_featured'], 'string'],
            [['blog_tag', 'blog_heading'], 'string'],
            [['blog_content'], 'string'],
            [['blog_image', 'blog_video', 'blog_audio'], 'string'],
             [['file'],'safe'],
            [['file'],'file', 'extensions' => 'jpg, gif, png']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'blog_id' => Yii::t('app', 'Id'),
            'bmc_id' => Yii::t('app', 'Business Main Categories'),
            'bsc_id' => Yii::t('app', 'Business Sub Categories'),
            'blog_tag' => Yii::t('app', 'Tag'),
            'blog_heading' => Yii::t('app', 'Heading'),
            'blog_content' => Yii::t('app', 'Content'),
            'file' => Yii::t('app', 'Image'),
            'blog_video' => Yii::t('app', 'Video'),
            'blog_audio' => Yii::t('app', 'Audio'),
            'blog_user_id' => Yii::t('app', 'User Id'),
            'blog_created' => Yii::t('app', 'Created'),
            'blog_updated' => Yii::t('app', 'Updated'),
            'deleted' => Yii::t('app', 'Deleted'),
            'blog_verified' => Yii::t('app', 'Verified'),
            'blog_featured' => Yii::t('app', 'Is Featured'),
        ];
    }

    /**
     * @inheritdoc
     * @return BlogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BlogQuery(get_called_class());
    }
}
