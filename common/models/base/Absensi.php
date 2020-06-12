<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "absensi".
 *
 * @property integer $id_siswa
 * @property integer $id_status_absensi
 * @property string $tanggal
 *
 * @property \common\models\Siswa $siswa
 * @property \common\models\StatusAbsensi $statusAbsensi
 */
class Absensi extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'siswa',
            'statusAbsensi'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_status_absensi'], 'required'],
            [['id_status_absensi'], 'integer'],
            [['tanggal'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'absensi';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_siswa' => 'Id Siswa',
            'id_status_absensi' => 'Id Status Absensi',
            'tanggal' => 'Tanggal',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswa()
    {
        return $this->hasOne(\common\models\Siswa::className(), ['id_siswa' => 'id_siswa']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusAbsensi()
    {
        return $this->hasOne(\common\models\StatusAbsensi::className(), ['id_status_absensi' => 'id_status_absensi']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\AbsensiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\AbsensiQuery(get_called_class());
    }
     
    public function formName() {
        return '';
    }
}
