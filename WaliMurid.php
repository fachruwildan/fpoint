<?php

namespace common\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "wali_murid".
 *
 * @property integer $id_wali_murid
 * @property integer $id_pekerjaan
 * @property integer $id_agama
 * @property string $nama_wali_murid
 * @property string $tempat_lahir_wali_murid
 * @property string $tanggal_lahir_wali_murid
 * @property string $jenis_kelamin_wali_murid
 * @property string $alamat_rumah_wali_murid
 * @property string $no_hp_wali_murid
 *
 * @property \common\models\Siswa[] $siswas
 * @property \common\models\Agama $agama
 * @property \common\models\Pekerjaan $pekerjaan
 */
class WaliMurid extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'siswas',
            'agama',
            'pekerjaan'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pekerjaan', 'id_agama', 'nama_wali_murid', 'tempat_lahir_wali_murid', 'tanggal_lahir_wali_murid', 'jenis_kelamin_wali_murid', 'alamat_rumah_wali_murid', 'no_hp_wali_murid'], 'required'],
            [['id_pekerjaan', 'id_agama'], 'integer'],
            [['tanggal_lahir_wali_murid'], 'safe'],
            [['jenis_kelamin_wali_murid', 'alamat_rumah_wali_murid'], 'string'],
            [['nama_wali_murid', 'tempat_lahir_wali_murid'], 'string', 'max' => 50],
            [['no_hp_wali_murid'], 'string', 'max' => 15],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wali_murid';
    }

    /**
     *
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock
     *
     */
    public function optimisticLock() {
        return 'lock';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_wali_murid' => 'Id Wali Murid',
            'id_pekerjaan' => 'Id Pekerjaan',
            'id_agama' => 'Id Agama',
            'nama_wali_murid' => 'Nama Wali Murid',
            'tempat_lahir_wali_murid' => 'Tempat Lahir Wali Murid',
            'tanggal_lahir_wali_murid' => 'Tanggal Lahir Wali Murid',
            'jenis_kelamin_wali_murid' => 'Jenis Kelamin Wali Murid',
            'alamat_rumah_wali_murid' => 'Alamat Rumah Wali Murid',
            'no_hp_wali_murid' => 'No Hp Wali Murid',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswas()
    {
        return $this->hasMany(\common\models\Siswa::className(), ['id_wali_murid' => 'id_wali_murid']);
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
    public function getPekerjaan()
    {
        return $this->hasOne(\common\models\Pekerjaan::className(), ['id_pekerjaan' => 'id_pekerjaan']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }


    /**
     * @inheritdoc
     * @return \app\models\WaliMuridQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\WaliMuridQuery(get_called_class());
    }
}
