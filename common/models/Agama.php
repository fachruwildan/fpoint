<?php

namespace common\models;

use Yii;
use \common\models\base\Agama as BaseAgama;

/**
 * This is the model class for table "agama".
 */
class Agama extends BaseAgama
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['agama'], 'string', 'max' => 20]
        ]);
    }
	
}
