<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payments".
 *
 * @property integer $pmnt_id
 * @property string $pmnt_tag
 * @property integer $pmnt_user_id
 * @property string $pmnt_description
 * @property integer $pmnt_amount
 * @property string $pmnt_mode
 * @property string $pmnt_chequeortrans_id
 * @property integer $pmnt_due
 * @property integer $pmnt_paid
 * @property string $pmnt_paid_date
 * @property string $pmnt_due_date
 * @property string $pmnt_updated
 * @property string $pmnt_deleted
 */
class Payments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pmnt_user_id', 'pmnt_amount', 'pmnt_chequeortrans_id'], 'required'],
            [['pmnt_user_id', 'pmnt_amount', 'pmnt_due', 'pmnt_paid'], 'integer'],
            [['pmnt_mode', 'pmnt_deleted'], 'string'],
            [['pmnt_paid_date', 'pmnt_due_date', 'pmnt_updated'], 'safe'],
            [['pmnt_tag', 'pmnt_chequeortrans_id'], 'string'],
            [['pmnt_description'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pmnt_id' => Yii::t('app', 'Id'),
            'pmnt_tag' => Yii::t('app', 'Tag'),
            'pmnt_user_id' => Yii::t('app', 'User Id'),
            'pmnt_description' => Yii::t('app', 'Description'),
            'pmnt_amount' => Yii::t('app', 'Amount'),
            'pmnt_mode' => Yii::t('app', 'Pmnt Mode'),
            'pmnt_chequeortrans_id' => Yii::t('app', 'Pmnt Chequeortrans ID'),
            'pmnt_due' => Yii::t('app', 'Due'),
            'pmnt_paid' => Yii::t('app', 'Paid'),
            'pmnt_paid_date' => Yii::t('app', 'Paid Date'),
            'pmnt_due_date' => Yii::t('app', 'Due Date'),
            'pmnt_updated' => Yii::t('app', 'Updated'),
            'pmnt_deleted' => Yii::t('app', 'Deleted'),
        ];
    }

    /**
     * @inheritdoc
     * @return PaymentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PaymentsQuery(get_called_class());
    }
}
