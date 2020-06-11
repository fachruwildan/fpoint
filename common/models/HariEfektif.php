<?php

namespace common\models;

use Yii;
use \common\models\base\HariEfektif as BaseHariEfektif;

/**
 * This is the model class for table "hari_efektif".
 */
class HariEfektif extends BaseHariEfektif
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_hari_efektif'], 'required'],
            [['id_hari_efektif'], 'integer'],
            [['nama_hari_efektif'], 'string', 'max' => 10]
        ]);
    }
	
}
