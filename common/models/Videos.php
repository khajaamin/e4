<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "videos".
 *
 * @property integer $vdo_id
 * @property string $vdo_url
 * @property integer $vdo_user_id
 * @property integer $vdo_ven_id
 * @property string $vdo_approved
 * @property string $vdo_created
 * @property string $vdo_updated
 * @property string $deleted
 */
class Videos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'videos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vdo_url'], 'required'],
            [['vdo_user_id', 'vdo_ven_id'], 'integer'],
            [['vdo_approved', 'deleted'], 'string'],
            [['vdo_created', 'vdo_updated'], 'safe'],
            [['vdo_url'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vdo_id' => Yii::t('app', 'Video ID'),
            'vdo_url' => Yii::t('app', 'Video Url'),
            'vdo_user_id' => Yii::t('app', 'Vdo User ID'),
            'vdo_ven_id' => Yii::t('app', 'Vendor ID'),
            'vdo_approved' => Yii::t('app', 'Vdo Approved'),
            'vdo_created' => Yii::t('app', 'Vdo Created'),
            'vdo_updated' => Yii::t('app', 'Vdo Updated'),
            'deleted' => Yii::t('app', 'Vdo Deleted'),
        ];
    }

    /**
     * @inheritdoc
     * @return VideosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VideosQuery(get_called_class());
    }
}
