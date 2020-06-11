<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "aturan".
 *
 * @property integer $id_aturan
 * @property integer $id_kategori
 * @property integer $id_tindakan
 * @property string $pasal
 * @property string $uraian_aturan
 * @property integer $point_aturan
 *
 * @property \common\models\KategoriAturan $kategori
 * @property \common\models\Tindakan $tindakan
 * @property \common\models\Pelanggaran[] $pelanggarans
 * @property \common\models\Siswa[] $siswas
 */
class Aturan extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'kategori',
            'tindakan',
            'pelanggarans',
            'siswas'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kategori', 'id_tindakan', 'point_aturan'], 'integer'],
            [['uraian_aturan'], 'string'],
            [['pasal'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aturan';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_aturan' => 'Id Aturan',
            'id_kategori' => 'Id Kategori',
            'id_tindakan' => 'Id Tindakan',
            'pasal' => 'Pasal',
            'uraian_aturan' => 'Uraian Aturan',
            'point_aturan' => 'Point Aturan',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategori()
    {
        return $this->hasOne(\common\models\KategoriAturan::className(), ['id_kategori' => 'id_kategori']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTindakan()
    {
        return $this->hasOne(\common\models\Tindakan::className(), ['id_tindakan' => 'id_tindakan']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelanggarans()
    {
        return $this->hasMany(\common\models\Pelanggaran::className(), ['id_aturan' => 'id_aturan']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswas()
    {
        return $this->hasMany(\common\models\Siswa::className(), ['id_siswa' => 'id_siswa'])->viaTable('pelanggaran', ['id_aturan' => 'id_aturan']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\AturanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\AturanQuery(get_called_class());
    }
}
