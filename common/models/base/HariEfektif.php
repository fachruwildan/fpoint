<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "hari_efektif".
 *
 * @property integer $id_hari_efektif
 * @property string $nama_hari_efektif
 * @property integer $status_hari_efektif
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
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_hari_efektif', 'status_hari_efektif'], 'required'],
            [['nama_hari_efektif'], 'string', 'max' => 10],
            [['status_hari_efektif'], 'string', 'max' => 1],
            [['nama_hari_efektif'], 'unique']
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
            'nama_hari_efektif' => 'Nama Hari',
            'status_hari_efektif' => 'Status Hari',
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
