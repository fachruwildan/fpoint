<?php

namespace common\models;

use Yii;
use \common\models\base\Siswa as BaseSiswa;
use borales\extensions\phoneInput\PhoneInputValidator;


/**
 * This is the model class for table "siswa".
 */
class Siswa extends BaseSiswa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_wali_murid', 'id_agama', 'nis', 'nama_siswa', 'tempat_lahir_siswa', 'tanggal_lahir_siswa', 'jenis_kelamin_siswa', 'alamat_rumah_siswa', 'alamat_domisili_siswa', 'no_hp_siswa'], 'required'],
            [['id_wali_murid', 'id_agama'], 'integer'],
            [['tanggal_lahir_siswa'], 'safe'],
            [['jenis_kelamin_siswa', 'alamat_rumah_siswa', 'alamat_domisili_siswa'], 'string'],
            [['nis'], 'string', 'max' => 20],
            [['nama_siswa'], 'string', 'max' => 50],
            [['tempat_lahir_siswa'], 'string', 'max' => 40],
            [['no_hp_siswa'], 'string', 'max' => 15],
            [['foto_siswa'], 'string', 'max' => 255],
            [['no_hp_siswa'], PhoneInputValidator::className()],
        ]);
    }
	
}
