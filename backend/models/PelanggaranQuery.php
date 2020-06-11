<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Pelanggaran]].
 *
 * @see \app\models\Pelanggaran
 */
class PelanggaranQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Pelanggaran[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Pelanggaran|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
