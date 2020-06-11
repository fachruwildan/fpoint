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
            [['nama_hari_efektif', 'status_hari_efektif'], 'required'],
            [['nama_hari_efektif'], 'string', 'max' => 10],
            [['status_hari_efektif'], 'string', 'max' => 1],
            [['nama_hari_efektif'], 'unique']
        ]);
    }
	
}
