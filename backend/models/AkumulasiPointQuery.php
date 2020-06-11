<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\AkumulasiPoint]].
 *
 * @see \app\models\AkumulasiPoint
 */
class AkumulasiPointQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\AkumulasiPoint[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\AkumulasiPoint|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
