<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Sanksi]].
 *
 * @see \app\models\Sanksi
 */
class SanksiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Sanksi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Sanksi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
