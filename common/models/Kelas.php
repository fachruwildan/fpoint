<?php

namespace common\models;

use Yii;
use \common\models\base\Kelas as BaseKelas;

/**
 * This is the model class for table "kelas".
 */
class Kelas extends BaseKelas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_jurusan', 'id_wali_kelas'], 'integer'],
            [['kelas', 'grade'], 'string', 'max' => 3]
        ]);
    }
	
}
