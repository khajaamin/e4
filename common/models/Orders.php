<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $product
 * @property string $desc
 * @property string $email
 * @property string $contact
 * @property string $approved
 * @property string $deleted
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product', 'email', 'contact'], 'required'],
            [['approved', 'deleted'], 'string'],
            [['product'], 'string', 'max' => 500],
            [['desc'], 'string', 'max' => 5000],
            [['email'], 'email'],
            [['contact'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product' => Yii::t('app', 'Which Product/Function You want'),
            'desc' => Yii::t('app', 'Description'),
            'email' => Yii::t('app', 'Your Email'),
            'contact' => Yii::t('app', 'Your Contact'),
            'approved' => Yii::t('app', 'Approved'),
            'deleted' => Yii::t('app', 'Deleted'),
        ];
    }

    /**
     * @inheritdoc
     * @return OrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrdersQuery(get_called_class());
    }
}
