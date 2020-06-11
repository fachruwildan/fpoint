<?php

namespace common\models;

use Yii;
use \common\models\base\WaliMurid as BaseWaliMurid;

/**
 * This is the model class for table "wali_murid".
 */
class WaliMurid extends BaseWaliMurid
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_pekerjaan', 'id_agama', 'nama_wali_murid', 'tempat_lahir_wali_murid', 'tanggal_lahir_wali_murid', 'jenis_kelamin_wali_murid', 'alamat_rumah_wali_murid', 'no_hp_wali_murid'], 'required'],
            [['id_pekerjaan', 'id_agama'], 'integer'],
            [['tanggal_lahir_wali_murid'], 'safe'],
            [['alamat_rumah_wali_murid'], 'string'],
            [['nama_wali_murid', 'tempat_lahir_wali_murid'], 'string', 'max' => 50],
            [['jenis_kelamin_wali_murid'], 'string', 'max' => 1],
            [['no_hp_wali_murid'], 'string', 'max' => 15]
        ]);
    }
	
}
