<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Editbusiness]].
 *
 * @see Editbusiness
 */
class EditbusinessQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Editbusiness[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Editbusiness|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}