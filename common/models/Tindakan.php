<?php

namespace common\models;

use Yii;
use \common\models\base\Tindakan as BaseTindakan;

/**
 * This is the model class for table "tindakan".
 */
class Tindakan extends BaseTindakan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['tindakan'], 'string']
        ]);
    }
	
}
