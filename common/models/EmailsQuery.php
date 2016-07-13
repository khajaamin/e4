<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Emails]].
 *
 * @see Emails
 */
class EmailsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Emails[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Emails|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}