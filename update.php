<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WaliMurid */

$this->title = 'Update Wali Murid: ' . ' ' . $model->id_wali_murid;
$this->params['breadcrumbs'][] = ['label' => 'Wali Murid', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_wali_murid, 'url' => ['view', 'id' => $model->id_wali_murid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wali-murid-update">
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
