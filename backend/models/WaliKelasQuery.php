<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\WaliKelas]].
 *
 * @see \app\models\WaliKelas
 */
class WaliKelasQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\WaliKelas[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\WaliKelas|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
