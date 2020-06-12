<?php

namespace common\models\base;

use Yii;
use borales\extensions\phoneInput\PhoneInputValidator;
/**
 * This is the base model class for table "pegawai".
 *
 * @property integer $id_pegawai
 * @property integer $id_agama
 * @property string $nama_pegawai
 * @property string $alamat_pegawai
 * @property string $jenis_kelamin_pegawai
 * @property string $no_hp_pegawai
 * @property string $status_kepegawaian
 * @property string $jabatan_pegawai
 * @property string $foto_pegawai
 *
 * @property \common\models\Agama $agama
 * @property \common\models\User[] $users
 * @property \common\models\WaliKelas[] $waliKelas
 */
class Pegawai extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'agama',
            'users',
            'waliKelas'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_agama', 'nama_pegawai', 'alamat_pegawai', 'jenis_kelamin_pegawai', 'no_hp_pegawai', 'status_kepegawaian', 'jabatan_pegawai'], 'required'],
            [['id_agama'], 'integer'],
            [['alamat_pegawai', 'jenis_kelamin_pegawai'], 'string'],
            [['nama_pegawai'], 'string', 'max' => 100],
            [['no_hp_pegawai'], 'string', 'max' => 15],
            [['status_kepegawaian', 'jabatan_pegawai'], 'string', 'max' => 50],
            [['foto_pegawai'], 'string', 'max' => 255],
            [['no_hp_pegawai'], PhoneInputValidator::className() ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pegawai' => 'Id Pegawai',
            'id_agama' => 'Agama',
            'nama_pegawai' => 'Nama',
            'alamat_pegawai' => 'Alamat',
            'jenis_kelamin_pegawai' => 'Jenis Kelamin',
            'no_hp_pegawai' => 'No Hp',
            'status_kepegawaian' => 'Status Kepegawaian',
            'jabatan_pegawai' => 'Jabatan',
            'foto_pegawai' => 'Foto',
        ];
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
    public function getUsers()
    {
        return $this->hasMany(\common\models\User::className(), ['id_pegawai' => 'id_pegawai']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaliKelas()
    {
        return $this->hasMany(\common\models\WaliKelas::className(), ['id_pegawai' => 'id_pegawai']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\PegawaiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PegawaiQuery(get_called_class());
    }
     
    public function formName() {
        return '';
    }
}
