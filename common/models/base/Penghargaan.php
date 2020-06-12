<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "penghargaan".
 *
 * @property integer $id_penghargaan
 * @property string $uraian_penghargaan
 * @property integer $point_penghargaan
 *
 * @property \common\models\Prestasi[] $prestasis
 * @property \common\models\Siswa[] $siswas
 */
class Penghargaan extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'prestasis',
            'siswas'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uraian_penghargaan'], 'string'],
            [['point_penghargaan'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penghargaan';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_penghargaan' => 'Id Penghargaan',
            'uraian_penghargaan' => 'Uraian Penghargaan',
            'point_penghargaan' => 'Point Penghargaan',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestasis()
    {
        return $this->hasMany(\common\models\Prestasi::className(), ['id_penghargaan' => 'id_penghargaan']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswas()
    {
        return $this->hasMany(\common\models\Siswa::className(), ['id_siswa' => 'id_siswa'])->viaTable('prestasi', ['id_penghargaan' => 'id_penghargaan']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\PenghargaanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PenghargaanQuery(get_called_class());
    }
     
    public function formName() {
        return '';
    }
}
