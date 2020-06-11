<?php

namespace common\models;

use Yii;
use \common\models\base\Jurusan as BaseJurusan;

/**
 * This is the model class for table "jurusan".
 */
class Jurusan extends BaseJurusan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['jurusan'], 'string', 'max' => 50],
            [['kepala_jurusan'], 'string', 'max' => 100]
        ]);
    }
	
}
