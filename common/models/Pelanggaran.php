<?php

namespace common\models;

use Yii;
use \common\models\base\Pelanggaran as BasePelanggaran;

/**
 * This is the model class for table "pelanggaran".
 */
class Pelanggaran extends BasePelanggaran
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_siswa', 'id_aturan'], 'required'],
            [['id_siswa', 'id_aturan'], 'integer'],
            [['tanggal'], 'safe']
        ]);
    }
	
}
