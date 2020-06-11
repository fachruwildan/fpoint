<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\StatusAbsensi]].
 *
 * @see \app\models\StatusAbsensi
 */
class StatusAbsensiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\StatusAbsensi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\StatusAbsensi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
