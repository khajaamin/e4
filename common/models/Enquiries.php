<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "enquiries".
 *
 * @property integer $enq_id
 * @property string $enq_user_id
 * @property integer $enq_ven_id
 * @property integer $enq_bsc_id
 * @property string $enq_name
 * @property string $enq_mob
 * @property string $enq_email
 * @property string $enq_sub
 * @property string $enq_comment
 * @property string $contacted
 * @property string $submited
 * @property string $deleted
 */
class Enquiries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'enquiries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enq_user_id', 'enq_ven_id', 'enq_bsc_id'], 'integer'],
            [['enq_sub', 'enq_comment'], 'required'],
            [['contacted', 'deleted'], 'string'],
            [['submited'], 'safe'],
            [['enq_name'], 'string'],
            [['enq_mob','enq_email'], 'string'],
            [['enq_sub'], 'string'],
            [['enq_comment'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'enq_id' => 'Enq ID',
            'enq_user_id' => 'Enq User ID',
            'enq_ven_id' => 'Enq Ven ID',
            'enq_bsc_id' => 'Enq Bsc ID',
            'enq_name' => 'Enq Name',
            'enq_mob' => 'Enq Mob',
            'enq_email' => 'Email ID',
            'enq_sub' => 'Enq Sub',
            'enq_comment' => 'Enq Comment',
            'contacted' => 'Contacted',
            'submited' => 'Submited',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * @inheritdoc
     * @return EnquiriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EnquiriesQuery(get_called_class());
    }
}
