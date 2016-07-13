<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[VendorsMoreCategories]].
 *
 * @see VendorsMoreCategories
 */
class VendorsMoreCategoriesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return VendorsMoreCategories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return VendorsMoreCategories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}