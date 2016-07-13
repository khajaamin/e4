<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "spotlight".
 *
 * @property integer $spotlt_id
 * @property string $spotlt_heading
 * @property string $spotlt_description
 * @property string $spotlt_image
 * @property string $spotlt_video
 * @property integer $spotlt_ven_id
 * @property string $spotlt_expery_date
 * @property string $spotlt_verified
 * @property string $spotlt_created
 * @property string $spotlt_updated
 * @property string $spotlt_deleted
 */
class Spotlight extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'spotlight';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['spotlt_heading', 'spotlt_description', 'spotlt_ven_id', 'spotlt_expery_date'], 'required'],
            [['spotlt_ven_id'], 'integer'],
            [['spotlt_expery_date', 'spotlt_created', 'spotlt_updated'], 'safe'],
            [['spotlt_verified', 'spotlt_deleted'], 'string'],
            [['spotlt_heading'], 'string'],
            [['spotlt_description'], 'string'],
            [['spotlt_video'], 'string'],
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
            'spotlt_id' => Yii::t('app', 'ID'),
            'spotlt_heading' => Yii::t('app', 'Heading'),
            'spotlt_description' => Yii::t('app', 'Description'),
            'file' => Yii::t('app', 'Image'),
            'spotlt_video' => Yii::t('app', 'Video Url'),
            'spotlt_ven_id' => Yii::t('app', 'Vendor Id'),
            'spotlt_expery_date' => Yii::t('app', 'Expiry Date'),
            'spotlt_verified' => Yii::t('app', 'Verifyed'),
            'spotlt_created' => Yii::t('app', 'Created'),
            'spotlt_updated' => Yii::t('app', 'Updated'),
            'spotlt_deleted' => Yii::t('app', 'Deleted'),
        ];
    }

    /**
     * @inheritdoc
     * @return SpotlightQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SpotlightQuery(get_called_class());
    }
}
