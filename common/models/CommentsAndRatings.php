<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comments_and_ratings".
 *
 * @property integer $cr_id
 * @property string $cr_comment
 * @property integer $cr_ratings
 * @property string $cr_type
 * @property integer $cr_type_id
 * @property integer $cr_user_id
 * @property string $cr_verified
 * @property string $cr_created
 * @property string $cr_updated
 * @property string $deleted
 */
class CommentsAndRatings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments_and_ratings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cr_comment', 'cr_ratings', 'cr_type', 'cr_type_id', 'cr_user_id'], 'required'],
            [['cr_ratings', 'cr_type_id', 'cr_user_id'], 'integer'],
            [['cr_type', 'cr_verified', 'deleted'], 'string'],
            [['cr_created', 'cr_updated'], 'safe'],
            [['cr_comment'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cr_id' => Yii::t('app', 'ID'),
            'cr_comment' => Yii::t('app', 'Comment'),
            'cr_ratings' => Yii::t('app', 'Ratings'),
            'cr_type' => Yii::t('app', 'Type'),
            'cr_type_id' => Yii::t('app', 'Type ID'),
            'cr_user_id' => Yii::t('app', 'User ID'),
            'cr_verified' => Yii::t('app', 'Verified'),
            'cr_created' => Yii::t('app', 'Created'),
            'cr_updated' => Yii::t('app', 'Updated'),
            'deleted' => Yii::t('app', 'Cr Deleted'),
        ];
    }

    /**
     * @inheritdoc
     * @return CommentsAndRatingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommentsAndRatingsQuery(get_called_class());
    }
}
