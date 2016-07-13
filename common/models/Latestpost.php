<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "latestpost".
 *
 * @property integer $latest_post_id
 * @property string $latest_post_heading
 * @property string $latest_post_description
 * @property string $latest_post_image
 * @property string $latest_post_video
 * @property integer $latest_post_ven_id
 * @property string $latest_post_expery_date
 * @property string $latest_post_verified
 * @property string $latest_post_created
 * @property string $latest_post_updated
 * @property string $latest_post_deleted
 */
class Latestpost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'latestpost';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['latest_post_heading', 'latest_post_description', 'latest_post_image','latest_post_ven_id', 'latest_post_expery_date'], 'required'],
            [['latest_post_ven_id'], 'integer'],
            [['latest_post_expery_date', 'latest_post_created', 'latest_post_updated'], 'safe'],
            [['latest_post_verified', 'latest_post_deleted'], 'string'],
            [['latest_post_heading','latest_post_video'], 'string'],
            [['latest_post_description'], 'string'],
            [['file'],'safe'],
            [['file'],'file', 'extensions' => 'jpg, gif, png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'latest_post_id' => Yii::t('app', 'Id'),
            'latest_post_heading' => Yii::t('app', 'Heading'),
            'latest_post_description' => Yii::t('app', 'Description'),
            'file' => Yii::t('app', 'Image'),
            'latest_post_video' => Yii::t('app', 'Video Url'),
            'latest_post_ven_id' => Yii::t('app', 'Vendor Id'),
            'latest_post_expery_date' => Yii::t('app', 'Expiry Date'),
            'latest_post_verified' => Yii::t('app', 'Verified'),
            'latest_post_created' => Yii::t('app', 'Created'),
            'latest_post_updated' => Yii::t('app', 'Updated'),
            'latest_post_deleted' => Yii::t('app', 'Deleted'),
        ];
    }

    /**
     * @inheritdoc
     * @return LatestpostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LatestpostQuery(get_called_class());
    }
}
