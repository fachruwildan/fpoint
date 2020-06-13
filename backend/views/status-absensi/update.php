<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StatusAbsensi */

$this->title = 'Update Status Absensi: ' . ' ' . $model->id_status_absensi;
$this->params['breadcrumbs'][] = ['label' => 'Status Absensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_status_absensi, 'url' => ['view', 'id' => $model->id_status_absensi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="status-absensi-update">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <div class="box-body">
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

</div>
