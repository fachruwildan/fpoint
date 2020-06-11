<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "tindakan".
 *
 * @property integer $id_tindakan
 * @property string $tindakan
 *
 * @property \common\models\Aturan[] $aturans
 */
class Tindakan extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'aturans'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tindakan'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tindakan';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tindakan' => 'Id Tindakan',
            'tindakan' => 'Tindakan',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAturans()
    {
        return $this->hasMany(\common\models\Aturan::className(), ['id_tindakan' => 'id_tindakan']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\TindakanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\TindakanQuery(get_called_class());
    }
}
