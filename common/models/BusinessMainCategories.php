<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "business_main_categories".
 *
 * @property string $bmc_id
 * @property string $bmc_name
 * @property string $bmc_image
 * @property string $bmc_description
 * @property string $created
 * @property string $updated
 * @property string $deleted
 *
 * @property BusinessSubCategories[] $businessSubCategories
 */
class BusinessMainCategories extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'business_main_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created', 'updated'], 'safe'],
            [['deleted'], 'string'],
            [['bmc_name'], 'string'],
            [['bmc_image'], 'string'],
            [['bmc_description'], 'string'],
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
            'bmc_id' => Yii::t('app', 'Id'),
            'bmc_name' => Yii::t('app', 'Name'),
            'file' => Yii::t('app', 'Image'),
            'bmc_description' => Yii::t('app', 'Description'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
            'deleted' => Yii::t('app', 'Deleted'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessSubCategories()
    {
        return $this->hasMany(BusinessSubCategories::className(), ['bmc_id' => 'bmc_id']);
    }

    /**
     * @inheritdoc
     * @return BusinessMainCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BusinessMainCategoriesQuery(get_called_class());
    }
}
