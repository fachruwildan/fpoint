<?php

namespace common\models;

use Yii;
use \common\models\base\KategoriAturan as BaseKategoriAturan;

/**
 * This is the model class for table "kategori_aturan".
 */
class KategoriAturan extends BaseKategoriAturan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['kategori_aturan'], 'string', 'max' => 40]
        ]);
    }
	
}
