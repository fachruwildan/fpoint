<?php

namespace common\models;

use Yii;
use \common\models\base\StatusAbsensi as BaseStatusAbsensi;

/**
 * This is the model class for table "status_absensi".
 */
class StatusAbsensi extends BaseStatusAbsensi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['keterangan_status_absensi'], 'required'],
            [['keterangan_status_absensi'], 'string', 'max' => 40]
        ]);
    }
	
}
