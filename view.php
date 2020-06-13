<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Sanksi */

$this->title = $model->id_sanksi;
$this->params['breadcrumbs'][] = ['label' => 'Sanksi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sanksi-view">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                                                                    
                            <?= Html::a('Update', ['update', 'id' => $model->id_sanksi], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'id' => $model->id_sanksi], [
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
                        'id_sanksi',
        'uraian:ntext',
        'minimum_point',
        'maximum_point',
                    ];
                    echo DetailView::widget([
                        'model' => $model,
                        'attributes' => $gridColumn
                    ]);
                ?>
                    <!-- </div> -->
                                
                    <div class="pt-3">
                        <?php
                        if($providerAkumulasiPoint->totalCount){
                            $gridColumnAkumulasiPoint = [
                                ['class' => 'yii\grid\SerialColumn'],
                                    [
                'attribute' => 'siswa.id_siswa',
                'label' => 'Id Siswa'
            ],
                        'tanggal',
                            ];
                            echo Gridview::widget([
                                'dataProvider' => $providerAkumulasiPoint,
                                'pjax' => true,
                                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-akumulasi-point']],
                                'panel' => [
                                    //'type' => GridView::TYPE_PRIMARY,
                                    'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Akumulasi Point'),
                                ],
                                                        'export' => false,
                                                        'columns' => $gridColumnAkumulasiPoint
                            ]);
                        }
                        ?>

                    </div>
                                                                                            </div>
            </div>
        </div>
    </div>

</div>
