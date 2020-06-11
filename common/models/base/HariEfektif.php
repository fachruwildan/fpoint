<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "hari_efektif".
 *
 * @property integer $id_hari_efektif
 * @property string $nama_hari_efektif
 */
class HariEfektif extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            ''
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_hari_efektif'], 'required'],
            [['id_hari_efektif'], 'integer'],
            [['nama_hari_efektif'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hari_efektif';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_hari_efektif' => 'Id Hari Efektif',
            'nama_hari_efektif' => 'Nama Hari Efektif',
        ];
    }


    /**
     * @inheritdoc
     * @return \app\models\HariEfektifQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\HariEfektifQuery(get_called_class());
    }
}
