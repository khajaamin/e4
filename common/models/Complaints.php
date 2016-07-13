<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "complaints".
 *
 * @property integer $comp_id
 * @property string $comp_tag
 * @property string $comp_description
 * @property integer $comp_user_id
 * @property integer $comp_vendor_id
 * @property string $comp_image
 * @property string $comp_video
 * @property string $comp_audio
 * @property string $comp_status
 * @property string $comp_comment
 * @property string $comp_created
 * @property string $comp_updated
 * @property string $com_deleted
 */
class Complaints extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'complaints';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comp_tag', 'comp_description', 'comp_user_id'], 'required'],
            [['comp_user_id', 'comp_vendor_id'], 'integer'],
            [['comp_status', 'com_deleted'], 'string'],
            [['comp_created', 'comp_updated'], 'safe'],
            [['comp_tag'], 'string'],
            [['comp_description', 'comp_comment'], 'string'],
            [['comp_image', 'comp_video', 'comp_audio'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comp_id' => Yii::t('app', 'Id'),
            'comp_tag' => Yii::t('app', 'Tag'),
            'comp_description' => Yii::t('app', 'Description'),
            'comp_user_id' => Yii::t('app', 'User Id'),
            'comp_vendor_id' => Yii::t('app', 'Vendor Id'),
            'comp_image' => Yii::t('app', 'Image'),
            'comp_video' => Yii::t('app', 'Video'),
            'comp_audio' => Yii::t('app', 'Audio'),
            'comp_status' => Yii::t('app', 'Starus'),
            'comp_comment' => Yii::t('app', 'Comment'),
            'comp_created' => Yii::t('app', 'Created'),
            'comp_updated' => Yii::t('app', 'Updated'),
            'com_deleted' => Yii::t('app', 'Deleted'),
        ];
    }

    /**
     * @inheritdoc
     * @return ComplaintsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ComplaintsQuery(get_called_class());
    }
}
