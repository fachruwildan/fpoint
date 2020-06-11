<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Kelas]].
 *
 * @see \app\models\Kelas
 */
class KelasQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Kelas[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Kelas|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
