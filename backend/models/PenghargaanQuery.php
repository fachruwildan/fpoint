<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Penghargaan]].
 *
 * @see \app\models\Penghargaan
 */
class PenghargaanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Penghargaan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Penghargaan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
