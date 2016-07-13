<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vendors".
 *
 * @property integer $ven_id
 * @property string $ven_company_name
 * @property string $ven_main_category_id
 * @property integer $ven_sub_category_id
 * @property string $ven_services_offered
 * @property string $ven_business_logo
 * @property string $ven_company_descr
 * @property string $ven_established_date
 * @property integer $ven_noof_emp
 * @property string $ven_branches_loc
 * @property string $ven_market_area
 * @property string $ven_website
 * @property string $ven_specialized_in
 * @property string $ven_contact_no
 * @property string $ven_email_id
 * @property string $ven_address
 * @property integer $ven_country_id
 * @property integer $ven_state_id
 * @property integer $ven_city_id
 * @property integer $ven_location_id
 * @property string $ven_zip
 * @property integer $ven_contact_person_id
 * @property string $ven_verified
 * @property string $created
 * @property string $updated
 * @property string $deleted
 */
class Vendors extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vendors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ven_company_name', 'ven_main_category_id', 'ven_sub_category_id','ven_country_code','ven_contact_no', 'ven_email_id', 'ven_address', 'ven_country_id', 'ven_zip'], 'required'],
            [['ven_main_category_id', 'ven_sub_category_id', 'ven_noof_emp', 'ven_country_id', 'ven_state_id', 'ven_city_id', 'ven_zip', 'ven_contact_person_id'], 'integer'],
            [['created', 'updated', 'paid'], 'safe'],
            [['ven_verified', 'deleted'], 'string'],
            [['ven_company_name', 'ven_website'], 'string'],
            [['ven_established_date'], 'string'],
            [['ven_email_id'], 'email'],
            [['ven_services_offered', 'ven_company_descr', 'ven_branches_loc', 'ven_market_area'], 'string'],
            [['ven_business_logo'], 'string'],
            [['ven_specialized_in', 'ven_address'], 'string'],
           // [['ven_contact_no'], 'number'],
            [['ven_contact_no'], 'string'],
            [['ven_country_code'], 'string'],
            [['file'],'safe'],
            [['file'],'file', 'extensions' => 'jpg, gif, png'],
            [['ven_email_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ven_id' => Yii::t('app', 'Vendor Id'),
            'ven_company_name' => Yii::t('app', 'Company Name'),
            'ven_main_category_id' => Yii::t('app', 'Main Business Category'),
            'ven_sub_category_id' => Yii::t('app', 'Sub Business Category'),
            'ven_services_offered' => Yii::t('app', 'Services Offered by You'),
            'file' => Yii::t('app', 'Logo'),
            'ven_company_descr' => Yii::t('app', 'Company Description'),
            'ven_established_date' => Yii::t('app', 'When did you established your Business?'),
            'ven_noof_emp' => Yii::t('app', 'Number Of Employees'),
            'ven_branches_loc' => Yii::t('app', 'Your Branch Location'),
            'ven_market_area' => Yii::t('app', 'Your Market Area'),
            'ven_website' => Yii::t('app', 'Your Website'),
            'ven_specialized_in' => Yii::t('app', 'Speciality'),
            'ven_country_code' => Yii::t('app', 'Country Code.'),
            'ven_contact_no' => Yii::t('app', 'Contact No.'),
            'ven_email_id' => Yii::t('app', 'Email Id'),
            'ven_address' => Yii::t('app', 'Address'),
            'ven_country_id' => Yii::t('app', 'Country'),
            'ven_state_id' => Yii::t('app', 'State'),
            'ven_city_id' => Yii::t('app', 'CIty'),
            'ven_location_id' => Yii::t('app', 'Location'),
            'ven_zip' => Yii::t('app', 'Zip'),
            'ven_contact_person_id' => Yii::t('app', 'Contact Person Id'),
            'ven_verified' => Yii::t('app', 'Verified'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
            'deleted' => Yii::t('app', 'Deleted'),
        ];
    }

    /**
     * @inheritdoc
     * @return VendorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VendorsQuery(get_called_class());
    }
}
