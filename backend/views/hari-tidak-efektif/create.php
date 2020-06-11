<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\HariTidakEfektif */

$this->title = 'Create Hari Tidak Efektif';
$this->params['breadcrumbs'][] = ['label' => 'Hari Tidak Efektif', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hari-tidak-efektif-create">
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
