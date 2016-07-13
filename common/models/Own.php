<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "own".
 *
 * @property integer $own_id
 * @property integer $own_ven_id
 * @property integer $own_user_id
 * @property string $name
 * @property string $contact
 * @property string $email
 * @property string $comment
 * @property string $created
 * @property string $updated
 * @property string $deleted
 * @property string $verified
 */
class Own extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'own';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['own_ven_id', 'own_user_id', 'name', 'contact', 'email', 'comment', 'updated'], 'required'],
            [['own_ven_id', 'own_user_id'], 'integer'],
            [['created'], 'safe'],
            [['deleted', 'verified'], 'string'],
            [['name', 'contact', 'email'], 'string'],
            [['comment'], 'string'],
            [['updated'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'own_id' => 'Own ID',
            'own_ven_id' => 'Own Ven ID',
            'own_user_id' => 'Own User ID',
            'name' => 'Name',
            'contact' => 'Contact',
            'email' => 'Email',
            'comment' => 'Comment',
            'created' => 'Created',
            'updated' => 'Updated',
            'deleted' => 'Deleted',
            'verified' => 'Verified',
        ];
    }

    /**
     * @inheritdoc
     * @return OwnQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OwnQuery(get_called_class());
    }
}
