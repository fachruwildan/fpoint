<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "nama_kelas".
 *
 * @property integer $id_kelas
 * @property string $nama_kelas
 *
 * @property \common\models\Kelas $kelas
 */
class NamaKelas extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'kelas'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_kelas'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nama_kelas';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kelas' => 'Id Kelas',
            'nama_kelas' => 'Nama Kelas',
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
     * @inheritdoc
     * @return \app\models\NamaKelasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\NamaKelasQuery(get_called_class());
    }
}
