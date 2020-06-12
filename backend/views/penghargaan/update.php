<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Penghargaan */

$this->title = 'Update Penghargaan: ' . ' ' . $model->uraian_penghargaan;
$this->params['breadcrumbs'][] = ['label' => 'Penghargaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_penghargaan, 'url' => ['view', 'id' => $model->id_penghargaan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penghargaan-update">
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
