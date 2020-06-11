<?php

namespace common\models;

use Yii;
use \common\models\base\Aturan as BaseAturan;

/**
 * This is the model class for table "aturan".
 */
class Aturan extends BaseAturan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_kategori', 'id_tindakan', 'point_aturan'], 'integer'],
            [['uraian_aturan'], 'string'],
            [['pasal'], 'string', 'max' => 10]
        ]);
    }
	
}
