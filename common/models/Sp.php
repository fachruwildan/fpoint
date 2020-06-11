<?php

namespace common\models;

use Yii;
use \common\models\base\Sp as BaseSp;

/**
 * This is the model class for table "sp".
 */
class Sp extends BaseSp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_siswa', 'tanggal_sp', 'jml_point_pelanggaran'], 'required'],
            [['id_siswa', 'jml_point_pelanggaran'], 'integer'],
            [['tanggal_sp'], 'safe']
        ]);
    }
	
}
