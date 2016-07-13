<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[CommentsAndRatings]].
 *
 * @see CommentsAndRatings
 */
class CommentsAndRatingsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return CommentsAndRatings[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CommentsAndRatings|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}