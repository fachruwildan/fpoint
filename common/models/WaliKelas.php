<?php

namespace common\models;

use Yii;
use \common\models\base\WaliKelas as BaseWaliKelas;

/**
 * This is the model class for table "wali_kelas".
 */
class WaliKelas extends BaseWaliKelas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_wali_kelas', 'id_pegawai'], 'required'],
            [['id_wali_kelas', 'id_pegawai'], 'integer']
        ]);
    }
	
}
