<?php

namespace common\models;

use Yii;
use \common\models\base\Penghargaan as BasePenghargaan;

/**
 * This is the model class for table "penghargaan".
 */
class Penghargaan extends BasePenghargaan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['uraian_penghargaan'], 'string'],
            [['point_penghargaan'], 'integer']
        ]);
    }
	
}
