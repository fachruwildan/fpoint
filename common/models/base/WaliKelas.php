<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "wali_kelas".
 *
 * @property integer $id_wali_kelas
 * @property integer $id_pegawai
 *
 * @property \common\models\Kelas $kelas
 * @property \common\models\Pegawai $pegawai
 */
class WaliKelas extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'kelas',
            'pegawai'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pegawai'], 'required'],
            [['id_pegawai'], 'integer'],
            [['id_pegawai'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wali_kelas';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_wali_kelas' => 'Id Wali Kelas',
            'id_pegawai' => 'Nama Pegawai',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelas()
    {
        return $this->hasOne(\common\models\Kelas::className(), ['id_wali_kelas' => 'id_wali_kelas']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai()
    {
        return $this->hasOne(\common\models\Pegawai::className(), ['id_pegawai' => 'id_pegawai']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\WaliKelasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\WaliKelasQuery(get_called_class());
    }
}
