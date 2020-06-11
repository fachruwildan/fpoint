<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\KategoriAturan]].
 *
 * @see \app\models\KategoriAturan
 */
class KategoriAturanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\KategoriAturan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\KategoriAturan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
