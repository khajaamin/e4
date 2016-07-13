<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "locations".
 *
 * @property integer $id
 * @property string $name
 * @property integer $city_id
 *
 * @property Cities $city
 */
class Locations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'locations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'city_id'], 'required'],
            [['city_id'], 'integer'],
            [['name'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Location Id'),
            'name' => Yii::t('app', 'Name'),
            'city_id' => Yii::t('app', 'City Id'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(Cities::className(), ['id' => 'city_id']);
    }

    /**
     * @inheritdoc
     * @return LocationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LocationsQuery(get_called_class());
    }
}
