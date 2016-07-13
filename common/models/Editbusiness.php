<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "editbusiness".
 *
 * @property integer $edit_bui_id
 * @property integer $edit_ven_id
 * @property string $edit_bui_email
 * @property string $edit_bui_contact
 * @property string $edit_type
 * @property string $edit_user_type
 * @property string $edit_bui_inaccurate
 * @property string $edit_bui_shutdown
 * @property string $edit_bui_comment
 */
class Editbusiness extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'editbusiness';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['edit_ven_id', 'edit_bui_email'], 'required'],
            [['edit_ven_id'], 'integer'],
            [['created'], 'safe'],
            [['deleted', 'status'], 'string'],
            [['edit_type', 'edit_user_type', 'edit_bui_inaccurate', 'edit_bui_shutdown'], 'string'],
            [['edit_bui_email', 'edit_bui_contact'], 'string'],
            [['edit_bui_comment'], 'string'],
            [['updated'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'edit_bui_id' => 'ID',
            'edit_ven_id' => 'Ven ID',
            'edit_bui_email' => 'Email',
            'edit_bui_contact' => 'Contact',
            'edit_type' => 'Type',
            'edit_user_type' => 'User Type',
            'edit_bui_inaccurate' => 'Inaccurate',
            'edit_bui_shutdown' => 'Shutdown',
            'edit_bui_comment' => 'Comment',
            'status' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return EditbusinessQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EditbusinessQuery(get_called_class());
    }
}
