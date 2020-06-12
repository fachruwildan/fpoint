<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "sanksi".
 *
 * @property integer $id_sanksi
 * @property string $uraian
 * @property integer $minimum_point
 * @property integer $maximum_point
 *
 * @property \common\models\AkumulasiPoint[] $akumulasiPoints
 * @property \common\models\Siswa[] $siswas
 */
class Sanksi extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'akumulasiPoints',
            'siswas'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uraian'], 'string'],
            [['minimum_point', 'maximum_point'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sanksi';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sanksi' => 'Id Sanksi',
            'uraian' => 'Uraian',
            'minimum_point' => 'Minimum Point',
            'maximum_point' => 'Maximum Point',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkumulasiPoints()
    {
        return $this->hasMany(\common\models\AkumulasiPoint::className(), ['id_sanksi' => 'id_sanksi']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswas()
    {
        return $this->hasMany(\common\models\Siswa::className(), ['id_siswa' => 'id_siswa'])->viaTable('akumulasi_point', ['id_sanksi' => 'id_sanksi']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\SanksiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\SanksiQuery(get_called_class());
    }
     
    public function formName() {
        return '';
    }
}
