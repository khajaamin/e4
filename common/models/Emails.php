<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "emails".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $email
 * @property string $subject
 * @property string $content
 *
 * @property User $id0
 */
class Emails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['email', 'subject', 'content'], 'required'],
            [['email', 'subject'], 'string', 'max' => 50],
            [['email'], 'email'],
            [['content'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'email' => Yii::t('app', 'Email'),
            'subject' => Yii::t('app', 'Subject'),
            'content' => Yii::t('app', 'Content'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return EmailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmailsQuery(get_called_class());
    }
}
