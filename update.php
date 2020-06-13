<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tindakan */

$this->title = 'Update Tindakan: ' . ' ' . $model->tindakan;
$this->params['breadcrumbs'][] = ['label' => 'Tindakan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tindakan, 'url' => ['view', 'id' => $model->id_tindakan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tindakan-update">
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
