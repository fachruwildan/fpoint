<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Agama]].
 *
 * @see \app\models\Agama
 */
class AgamaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Agama[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Agama|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
