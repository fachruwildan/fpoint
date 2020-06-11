<?php

namespace common\models;

use Yii;
use \common\models\base\AkumulasiPoint as BaseAkumulasiPoint;

/**
 * This is the model class for table "akumulasi_point".
 */
class AkumulasiPoint extends BaseAkumulasiPoint
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_siswa', 'id_sanksi'], 'required'],
            [['id_siswa', 'id_sanksi'], 'integer'],
            [['tanggal'], 'safe']
        ]);
    }
	
}
