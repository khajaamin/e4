<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[BusinessSubCategories]].
 *
 * @see BusinessSubCategories
 */
class BusinessSubCategoriesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return BusinessSubCategories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BusinessSubCategories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}