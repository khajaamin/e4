<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Spotlight]].
 *
 * @see Spotlight
 */
class SpotlightQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Spotlight[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Spotlight|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}