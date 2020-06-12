<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "kelas".
 *
 * @property integer $id_kelas
 * @property integer $id_jurusan
 * @property integer $id_wali_kelas
 * @property string $kelas
 * @property string $grade
 *
 * @property \common\models\Jurusan $jurusan
 * @property \common\models\WaliKelas $waliKelas
 * @property \common\models\NamaKelas $namaKelas
 * @property \common\models\OnKelasSiswa[] $onKelasSiswas
 * @property \common\models\Siswa[] $siswas
 */
class Kelas extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'jurusan',
            'waliKelas',
            'namaKelas',
            'onKelasSiswas',
            'siswas'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jurusan', 'id_wali_kelas'], 'integer'],
            [['kelas', 'grade'], 'string', 'max' => 3],
            [['id_wali_kelas'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kelas';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kelas' => 'Id Kelas',
            'id_jurusan' => 'Id Jurusan',
            'id_wali_kelas' => 'Id Wali Kelas',
            'kelas' => 'Kelas',
            'grade' => 'Grade',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJurusan()
    {
        return $this->hasOne(\common\models\Jurusan::className(), ['id_jurusan' => 'id_jurusan']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaliKelas()
    {
        return $this->hasOne(\common\models\WaliKelas::className(), ['id_wali_kelas' => 'id_wali_kelas']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNamaKelas()
    {
        return $this->hasOne(\common\models\NamaKelas::className(), ['id_kelas' => 'id_kelas']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOnKelasSiswas()
    {
        return $this->hasMany(\common\models\OnKelasSiswa::className(), ['id_kelas' => 'id_kelas']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswas()
    {
        return $this->hasMany(\common\models\Siswa::className(), ['id_siswa' => 'id_siswa'])->viaTable('on_kelas_siswa', ['id_kelas' => 'id_kelas']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\KelasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\KelasQuery(get_called_class());
    }
    
    public function formName() {
        return '';
    }
}
