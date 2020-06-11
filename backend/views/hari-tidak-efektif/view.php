<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\HariTidakEfektif */

$this->title = $model->tanggal_tidak_efektif;
$this->params['breadcrumbs'][] = ['label' => 'Hari Tidak Efektif', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hari-tidak-efektif-view">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                                                                    
                            <?= Html::a('Update', ['update', 'id' => $model->id_hari_tidak_efektif], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'id' => $model->id_hari_tidak_efektif], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ])
                            ?>
                </div>
                <div class="box-body">
                    <!-- <div class="row"> -->
                <?php 
                    $gridColumn = [
                        ['attribute' => 'id_hari_tidak_efektif', 'visible' => false],
        'tanggal_tidak_efektif',
        'keterangan_tidak_efektif:ntext',
                    ];
                    echo DetailView::widget([
                        'model' => $model,
                        'attributes' => $gridColumn
                    ]);
                ?>
                    <!-- </div> -->
                                </div>
            </div>
        </div>
    </div>

</div>
