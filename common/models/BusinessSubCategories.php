<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "business_sub_categories".
 *
 * @property integer $bsc_id
 * @property string $bsc_name
 * @property string $bsc_image
 * @property string $bsc_description
 * @property string $bmc_id
 * @property string $created
 * @property string $updated
 * @property string $deleted
 *
 * @property BusinessMainCategories $bmc
 */
class BusinessSubCategories extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'business_sub_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bsc_name', 'bmc_id'], 'required'],
            [['bmc_id'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['deleted'], 'string'],
            [['bsc_name', 'bsc_image'], 'string'],
            [['bsc_description'], 'string'],
            [['file'], 'safe'], //public function rules()
            [['file'], 'file', 'extensions'=>'jpg, gif, png']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bsc_id' => Yii::t('app', 'Id'),
            'bsc_name' => Yii::t('app', 'Name'),
            'file' => Yii::t('app', 'Image'),
            'bsc_description' => Yii::t('app', 'Description'),
            'bmc_id' => Yii::t('app', 'Main Category Id'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
            'deleted' => Yii::t('app', 'Deleted'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBmc()
    {
        return $this->hasOne(BusinessMainCategories::className(), ['bmc_id' => 'bmc_id']);
    }

    /**
     * @inheritdoc
     * @return BusinessSubCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BusinessSubCategoriesQuery(get_called_class());
    }
}
