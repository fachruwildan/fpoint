<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "agama".
 *
 * @property integer $id_agama
 * @property string $agama
 *
 * @property \common\models\Pegawai[] $pegawais
 * @property \common\models\Siswa[] $siswas
 * @property \common\models\WaliMurid[] $waliMurs
 */
class Agama extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'pegawais',
            'siswas',
            'waliMurs'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agama'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agama';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_agama' => 'Id Agama',
            'agama' => 'Agama',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawais()
    {
        return $this->hasMany(\common\models\Pegawai::className(), ['id_agama' => 'id_agama']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswas()
    {
        return $this->hasMany(\common\models\Siswa::className(), ['id_agama' => 'id_agama']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaliMurs()
    {
        return $this->hasMany(\common\models\WaliMurid::className(), ['id_agama' => 'id_agama']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\AgamaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\AgamaQuery(get_called_class());
    }
     
    public function formName() {
        return '';
    }
}
