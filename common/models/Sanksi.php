<?php

namespace common\models;

use Yii;
use \common\models\base\Sanksi as BaseSanksi;

/**
 * This is the model class for table "sanksi".
 */
class Sanksi extends BaseSanksi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['uraian'], 'string'],
            [['minimum_point', 'maximum_point'], 'integer']
        ]);
    }
	
}
