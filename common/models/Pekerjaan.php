<?php

namespace common\models;

use Yii;
use \common\models\base\Pekerjaan as BasePekerjaan;

/**
 * This is the model class for table "pekerjaan".
 */
class Pekerjaan extends BasePekerjaan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['nama_pekerjaan'], 'string', 'max' => 50]
        ]);
    }
	
}
