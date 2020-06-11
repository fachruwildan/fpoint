<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\HariEfektif */

$this->title = 'Update Hari Efektif: ' . ' ' . $model->id_hari_efektif;
$this->params['breadcrumbs'][] = ['label' => 'Hari Efektif', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_hari_efektif, 'url' => ['view', 'id' => $model->id_hari_efektif]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hari-efektif-update">
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
