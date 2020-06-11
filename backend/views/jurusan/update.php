<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Jurusan */

$this->title = 'Update Jurusan: ' . ' ' . $model->jurusan;
$this->params['breadcrumbs'][] = ['label' => 'Jurusan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jurusan, 'url' => ['view', 'id' => $model->id_jurusan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jurusan-update">
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
