<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Agama */

$this->title = 'Update Agama: ' . ' ' . $model->agama;
$this->params['breadcrumbs'][] = ['label' => 'Agama', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->agama, 'url' => ['view', 'id' => $model->id_agama]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="agama-update">
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
