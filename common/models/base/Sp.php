<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "sp".
 *
 * @property integer $id_sp
 * @property integer $id_siswa
 * @property string $tanggal_sp
 * @property integer $jml_point_pelanggaran
 *
 * @property \common\models\Siswa $siswa
 */
class Sp extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'siswa'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_siswa', 'tanggal_sp', 'jml_point_pelanggaran'], 'required'],
            [['id_siswa', 'jml_point_pelanggaran'], 'integer'],
            [['tanggal_sp'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sp';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sp' => 'Id Sp',
            'id_siswa' => 'Id Siswa',
            'tanggal_sp' => 'Tanggal Sp',
            'jml_point_pelanggaran' => 'Jml Point Pelanggaran',
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
     * @inheritdoc
     * @return \app\models\SpQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\SpQuery(get_called_class());
    }
     
    public function formName() {
        return '';
    }
}
