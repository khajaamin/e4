<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vendors_more_categories".
 *
 * @property integer $vmc_id
 * @property integer $ven_id
 * @property string $bmc_id
 * @property integer $bsc_id
 * @property string $created
 * @property string $deleted
 * @property string $vmc_approved
 */
class VendorsMoreCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vendors_more_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bmc_id', 'bsc_id'], 'required'],
            [['ven_id', 'bmc_id', 'bsc_id'], 'integer'],
            [['created'], 'safe'],
            [['deleted', 'vmc_approved'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vmc_id' => Yii::t('app', 'More Categories'),
            'ven_id' => Yii::t('app', 'Vendor Id'),
            'bmc_id' => Yii::t('app', 'Main Category'),
            'bsc_id' => Yii::t('app', 'Sub Category'),
            'created' => Yii::t('app', 'Created'),
            'deleted' => Yii::t('app', 'Deleted'),
            'vmc_approved' => Yii::t('app', 'Approved'),
        ];
    }

    /**
     * @inheritdoc
     * @return VendorsMoreCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VendorsMoreCategoriesQuery(get_called_class());
    }
}
