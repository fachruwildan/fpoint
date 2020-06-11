<?php

namespace common\models;

use Yii;
use \common\models\base\OnKelasSiswa as BaseOnKelasSiswa;

/**
 * This is the model class for table "on_kelas_siswa".
 */
class OnKelasSiswa extends BaseOnKelasSiswa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_kelas', 'id_siswa'], 'required'],
            [['id_kelas', 'id_siswa'], 'integer']
        ]);
    }
	
}
