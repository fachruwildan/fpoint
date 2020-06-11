<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\KategoriAturan */

$this->title = 'Update Kategori Aturan: ' . ' ' . $model->kategori_aturan;
$this->params['breadcrumbs'][] = ['label' => 'Kategori Aturan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kategori_aturan, 'url' => ['view', 'id' => $model->id_kategori]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kategori-aturan-update">
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
