<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "status_absensi".
 *
 * @property integer $id_status_absensi
 * @property string $keterangan_status_absensi
 *
 * @property \common\models\Absensi[] $absensis
 * @property \common\models\Siswa[] $siswas
 */
class StatusAbsensi extends \yii\db\ActiveRecord
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
            'siswas'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['keterangan_status_absensi'], 'required'],
            [['keterangan_status_absensi'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status_absensi';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_status_absensi' => 'Id Status Absensi',
            'keterangan_status_absensi' => 'Keterangan Status Absensi',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbsensis()
    {
        return $this->hasMany(\common\models\Absensi::className(), ['id_status_absensi' => 'id_status_absensi']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswas()
    {
        return $this->hasMany(\common\models\Siswa::className(), ['id_siswa' => 'id_siswa'])->viaTable('absensi', ['id_status_absensi' => 'id_status_absensi']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\StatusAbsensiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\StatusAbsensiQuery(get_called_class());
    }
     
    public function formName() {
        return '';
    }
}
