<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property integer $gallery_id
 * @property string $gallery_image
 * @property integer $gallery_user_id
 * @property integer $gallery_ven_id
 * @property string $gallery_approved
 * @property string $gallery_created
 * @property string $gallery_updated
 * @property string $deleted
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gallery_image'], 'required'],
            [['gallery_user_id', 'gallery_ven_id'], 'integer'],
            [['gallery_approved', 'deleted'], 'string'],
            [['gallery_created', 'gallery_updated'], 'safe'],
            [['gallery_image'], 'string'],
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
            'gallery_id' => Yii::t('app', 'Gallery ID'),
            'file' => Yii::t('app', 'Image'),
            'gallery_user_id' => Yii::t('app', 'Gallery User ID'),
            'gallery_ven_id' => Yii::t('app', 'Vendor ID'),
            'gallery_approved' => Yii::t('app', 'Gallery Approved'),
            'gallery_created' => Yii::t('app', 'Gallery Created'),
            'gallery_updated' => Yii::t('app', 'Gallery Updated'),
            'deleted' => Yii::t('app', 'Gallery Deleted'),
        ];
    }

    /**
     * @inheritdoc
     * @return GalleryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GalleryQuery(get_called_class());
    }
}
