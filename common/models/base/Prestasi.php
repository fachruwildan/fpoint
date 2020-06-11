<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "prestasi".
 *
 * @property integer $id_siswa
 * @property integer $id_penghargaan
 * @property string $tanggal
 *
 * @property \common\models\Siswa $siswa
 * @property \common\models\Penghargaan $penghargaan
 */
class Prestasi extends \yii\db\ActiveRecord
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
            'penghargaan'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_siswa', 'id_penghargaan'], 'required'],
            [['id_siswa', 'id_penghargaan'], 'integer'],
            [['tanggal'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prestasi';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_siswa' => 'Id Siswa',
            'id_penghargaan' => 'Id Penghargaan',
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
    public function getPenghargaan()
    {
        return $this->hasOne(\common\models\Penghargaan::className(), ['id_penghargaan' => 'id_penghargaan']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\PrestasiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PrestasiQuery(get_called_class());
    }
}
