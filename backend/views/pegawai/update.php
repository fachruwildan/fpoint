<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pegawai */

$this->title = 'Update Pegawai: ' . ' ' . $model->id_pegawai;
$this->params['breadcrumbs'][] = ['label' => 'Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pegawai, 'url' => ['view', 'id' => $model->id_pegawai]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pegawai-update">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <div class="box-body">
                    <?= $this->render('_form', [
                        'model' => $model,
                        'agama' => $agama,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

</div>
