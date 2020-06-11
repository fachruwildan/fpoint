<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Pegawai]].
 *
 * @see \app\models\Pegawai
 */
class PegawaiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Pegawai[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Pegawai|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
