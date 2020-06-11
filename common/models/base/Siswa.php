<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "siswa".
 *
 * @property integer $id_siswa
 * @property integer $id_wali_murid
 * @property integer $id_agama
 * @property string $nis
 * @property string $nama_siswa
 * @property string $tempat_lahir_siswa
 * @property string $tanggal_lahir_siswa
 * @property string $jenis_kelamin_siswa
 * @property string $alamat_rumah_siswa
 * @property string $alamat_domisili_siswa
 * @property string $no_hp_siswa
 * @property string $foto_siswa
 *
 * @property \common\models\Absensi[] $absensis
 * @property \common\models\StatusAbsensi[] $statusAbsensis
 * @property \common\models\AkumulasiPoint[] $akumulasiPoints
 * @property \common\models\Sanksi[] $sanksis
 * @property \common\models\OnKelasSiswa[] $onKelasSiswas
 * @property \common\models\Kelas[] $kelas
 * @property \common\models\Pelanggaran[] $pelanggarans
 * @property \common\models\Aturan[] $aturans
 * @property \common\models\Prestasi[] $prestasis
 * @property \common\models\Penghargaan[] $penghargaans
 * @property \common\models\Agama $agama
 * @property \common\models\WaliMurid $idWaliMur
 * @property \common\models\Sp[] $sps
 */
class Siswa extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'absensis',
            'statusAbsensis',
            'akumulasiPoints',
            'sanksis',
            'onKelasSiswas',
            'kelas',
            'pelanggarans',
            'aturans',
            'prestasis',
            'penghargaans',
            'agama',
            'idWaliMur',
            'sps'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_wali_murid', 'id_agama', 'nis', 'nama_siswa', 'tempat_lahir_siswa', 'tanggal_lahir_siswa', 'jenis_kelamin_siswa', 'alamat_rumah_siswa', 'alamat_domisili_siswa', 'no_hp_siswa'], 'required'],
            [['id_wali_murid', 'id_agama'], 'integer'],
            [['tanggal_lahir_siswa'], 'safe'],
            [['alamat_rumah_siswa', 'alamat_domisili_siswa'], 'string'],
            [['nis'], 'string', 'max' => 20],
            [['nama_siswa'], 'string', 'max' => 50],
            [['tempat_lahir_siswa'], 'string', 'max' => 40],
            [['jenis_kelamin_siswa'], 'string', 'max' => 1],
            [['no_hp_siswa'], 'string', 'max' => 15],
            [['foto_siswa'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'siswa';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_siswa' => 'Id Siswa',
            'id_wali_murid' => 'Id Wali Murid',
            'id_agama' => 'Id Agama',
            'nis' => 'Nis',
            'nama_siswa' => 'Nama Siswa',
            'tempat_lahir_siswa' => 'Tempat Lahir Siswa',
            'tanggal_lahir_siswa' => 'Tanggal Lahir Siswa',
            'jenis_kelamin_siswa' => 'Jenis Kelamin Siswa',
            'alamat_rumah_siswa' => 'Alamat Rumah Siswa',
            'alamat_domisili_siswa' => 'Alamat Domisili Siswa',
            'no_hp_siswa' => 'No Hp Siswa',
            'foto_siswa' => 'Foto Siswa',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbsensis()
    {
        return $this->hasMany(\common\models\Absensi::className(), ['id_siswa' => 'id_siswa']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusAbsensis()
    {
        return $this->hasMany(\common\models\StatusAbsensi::className(), ['id_status_absensi' => 'id_status_absensi'])->viaTable('absensi', ['id_siswa' => 'id_siswa']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkumulasiPoints()
    {
        return $this->hasMany(\common\models\AkumulasiPoint::className(), ['id_siswa' => 'id_siswa']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSanksis()
    {
        return $this->hasMany(\common\models\Sanksi::className(), ['id_sanksi' => 'id_sanksi'])->viaTable('akumulasi_point', ['id_siswa' => 'id_siswa']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOnKelasSiswas()
    {
        return $this->hasMany(\common\models\OnKelasSiswa::className(), ['id_siswa' => 'id_siswa']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelas()
    {
        return $this->hasMany(\common\models\Kelas::className(), ['id_kelas' => 'id_kelas'])->viaTable('on_kelas_siswa', ['id_siswa' => 'id_siswa']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelanggarans()
    {
        return $this->hasMany(\common\models\Pelanggaran::className(), ['id_siswa' => 'id_siswa']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAturans()
    {
        return $this->hasMany(\common\models\Aturan::className(), ['id_aturan' => 'id_aturan'])->viaTable('pelanggaran', ['id_siswa' => 'id_siswa']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestasis()
    {
        return $this->hasMany(\common\models\Prestasi::className(), ['id_siswa' => 'id_siswa']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenghargaans()
    {
        return $this->hasMany(\common\models\Penghargaan::className(), ['id_penghargaan' => 'id_penghargaan'])->viaTable('prestasi', ['id_siswa' => 'id_siswa']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgama()
    {
        return $this->hasOne(\common\models\Agama::className(), ['id_agama' => 'id_agama']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdWaliMur()
    {
        return $this->hasOne(\common\models\WaliMurid::className(), ['id_wali_murid' => 'id_wali_murid']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSps()
    {
        return $this->hasMany(\common\models\Sp::className(), ['id_siswa' => 'id_siswa']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\SiswaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\SiswaQuery(get_called_class());
    }
}
