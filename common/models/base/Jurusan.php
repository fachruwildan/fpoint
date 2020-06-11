<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "jurusan".
 *
 * @property integer $id_jurusan
 * @property string $jurusan
 * @property string $kepala_jurusan
 *
 * @property \common\models\Kelas[] $kelas
 */
class Jurusan extends \yii\db\ActiveRecord
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
            [['jurusan'], 'string', 'max' => 50],
            [['kepala_jurusan'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jurusan';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_jurusan' => 'Id Jurusan',
            'jurusan' => 'Jurusan',
            'kepala_jurusan' => 'Kepala Jurusan',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelas()
    {
        return $this->hasMany(\common\models\Kelas::className(), ['id_jurusan' => 'id_jurusan']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\JurusanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\JurusanQuery(get_called_class());
    }
}
