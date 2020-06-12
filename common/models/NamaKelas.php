<?php

namespace common\models;

use Yii;
use \common\models\base\NamaKelas as BaseNamaKelas;

/**
 * This is the model class for table "nama_kelas".
 */
class NamaKelas extends BaseNamaKelas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_kelas'], 'required'],
            [['id_kelas'], 'integer'],
            [['nama_kelas'], 'string', 'max' => 100]
        ]);
    }
	
}
