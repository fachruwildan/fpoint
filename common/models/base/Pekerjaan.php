<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "pekerjaan".
 *
 * @property integer $id_pekerjaan
 * @property string $nama_pekerjaan
 *
 * @property \common\models\WaliMurid[] $waliMurs
 */
class Pekerjaan extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'waliMurs'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_pekerjaan'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pekerjaan';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pekerjaan' => 'Id Pekerjaan',
            'nama_pekerjaan' => 'Nama Pekerjaan',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaliMurs()
    {
        return $this->hasMany(\common\models\WaliMurid::className(), ['id_pekerjaan' => 'id_pekerjaan']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\PekerjaanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PekerjaanQuery(get_called_class());
    }
     
    public function formName() {
        return '';
    }
}
