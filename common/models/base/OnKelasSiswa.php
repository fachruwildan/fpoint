<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "on_kelas_siswa".
 *
 * @property integer $id_kelas
 * @property integer $id_siswa
 *
 * @property \common\models\Kelas $kelas
 * @property \common\models\Siswa $siswa
 */
class OnKelasSiswa extends \yii\db\ActiveRecord
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
            'siswa'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kelas', 'id_siswa'], 'required'],
            [['id_kelas', 'id_siswa'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'on_kelas_siswa';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kelas' => 'Id Kelas',
            'id_siswa' => 'Id Siswa',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelas()
    {
        return $this->hasOne(\common\models\Kelas::className(), ['id_kelas' => 'id_kelas']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswa()
    {
        return $this->hasOne(\common\models\Siswa::className(), ['id_siswa' => 'id_siswa']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\OnKelasSiswaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\OnKelasSiswaQuery(get_called_class());
    }
}
