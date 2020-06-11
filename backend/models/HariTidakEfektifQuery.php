<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\HariTidakEfektif]].
 *
 * @see \app\models\HariTidakEfektif
 */
class HariTidakEfektifQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\HariTidakEfektif[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\HariTidakEfektif|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
