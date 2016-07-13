<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "livevents".
 *
 * @property integer $le_id
 * @property string $le_contact_name
 * @property string $le_image
 * @property string $le_role
 * @property string $le_event_category
 * @property string $le_event_name
 * @property string $le_description
 * @property string $le_venue
 * @property string $le_city_id
 * @property string $le_contacts
 * @property string $le_emailid
 * @property string $created
 * @property string $updated
 * @property string $deleted
 * @property string $verified
 * @property string $paid
 */
class Livevents extends \yii\db\ActiveRecord
{
     public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'livevents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['le_contact_name', 'le_role', 'le_event_category', 'le_event_name', 'le_description', 'le_venue', 'le_city_id', 'le_contacts', 'le_emailid'], 'required'],
            [['deleted', 'verified', 'paid'], 'string'],
            [['le_contact_name', 'le_image', 'le_event_name', 'le_venue', 'le_contacts'], 'string', 'max' => 500],
            [['le_emailid'], 'email'],
            [['le_role', 'le_event_category'], 'string', 'max' => 100],
            [['le_description'], 'string', 'max' => 10000],
            [['le_city_id'], 'string', 'max' => 50],
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
            'le_id' => Yii::t('app', 'Live event Id'),
            'le_contact_name' => Yii::t('app', 'Contact Name'),
            'file' => Yii::t('app', 'Image'),
            'le_image' => Yii::t('app', 'Image'),
            'le_role' => Yii::t('app', 'Role'),
            'le_event_category' => Yii::t('app', 'Le Event Category'),
            'le_event_name' => Yii::t('app', 'Event Name'),
            'le_description' => Yii::t('app', 'Description'),
            'le_venue' => Yii::t('app', 'Venue'),
            'le_city_id' => Yii::t('app', 'City'),
            'le_contacts' => Yii::t('app', 'Contacts'),
            'le_emailid' => Yii::t('app', 'Email Id'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
            'deleted' => Yii::t('app', 'Deleted'),
            'verified' => Yii::t('app', 'Verified'),
            'paid' => Yii::t('app', 'Paid'),
        ];
    }

    /**
     * @inheritdoc
     * @return LiveventsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LiveventsQuery(get_called_class());
    }
}