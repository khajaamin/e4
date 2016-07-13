<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Enquiries]].
 *
 * @see Enquiries
 */
class EnquiriesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Enquiries[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Enquiries|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}