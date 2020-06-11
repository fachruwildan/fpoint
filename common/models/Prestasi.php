<?php

namespace common\models;

use Yii;
use \common\models\base\Prestasi as BasePrestasi;

/**
 * This is the model class for table "prestasi".
 */
class Prestasi extends BasePrestasi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_siswa', 'id_penghargaan'], 'required'],
            [['id_siswa', 'id_penghargaan'], 'integer'],
            [['tanggal'], 'safe']
        ]);
    }
	
}
