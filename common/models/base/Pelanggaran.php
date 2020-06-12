<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "pelanggaran".
 *
 * @property integer $id_siswa
 * @property integer $id_aturan
 * @property string $tanggal
 *
 * @property \common\models\Siswa $siswa
 * @property \common\models\Aturan $aturan
 */
class Pelanggaran extends \yii\db\ActiveRecord
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
            'aturan'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_siswa', 'id_aturan'], 'required'],
            [['id_siswa', 'id_aturan'], 'integer'],
            [['tanggal'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pelanggaran';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_siswa' => 'Id Siswa',
            'id_aturan' => 'Id Aturan',
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
    public function getAturan()
    {
        return $this->hasOne(\common\models\Aturan::className(), ['id_aturan' => 'id_aturan']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\PelanggaranQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PelanggaranQuery(get_called_class());
    }
     
    public function formName() {
        return '';
    }
}
