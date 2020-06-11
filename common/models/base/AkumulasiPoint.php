<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "akumulasi_point".
 *
 * @property integer $id_siswa
 * @property integer $id_sanksi
 * @property string $tanggal
 *
 * @property \common\models\Siswa $siswa
 * @property \common\models\Sanksi $sanksi
 */
class AkumulasiPoint extends \yii\db\ActiveRecord
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
            'sanksi'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_siswa', 'id_sanksi'], 'required'],
            [['id_siswa', 'id_sanksi'], 'integer'],
            [['tanggal'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'akumulasi_point';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_siswa' => 'Id Siswa',
            'id_sanksi' => 'Id Sanksi',
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
    public function getSanksi()
    {
        return $this->hasOne(\common\models\Sanksi::className(), ['id_sanksi' => 'id_sanksi']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\AkumulasiPointQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\AkumulasiPointQuery(get_called_class());
    }
}
