<?php

namespace common\models\base;

use Yii;

/**
 * This is the base model class for table "kategori_aturan".
 *
 * @property integer $id_kategori
 * @property string $kategori_aturan
 *
 * @property \common\models\Aturan[] $aturans
 */
class KategoriAturan extends \yii\db\ActiveRecord
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
            [['kategori_aturan'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kategori_aturan';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kategori' => 'Id Kategori',
            'kategori_aturan' => 'Kategori Aturan',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAturans()
    {
        return $this->hasMany(\common\models\Aturan::className(), ['id_kategori' => 'id_kategori']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\KategoriAturanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\KategoriAturanQuery(get_called_class());
    }
     
    public function formName() {
        return '';
    }
}
