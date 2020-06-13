<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\WaliMurid */

$this->title = $model->id_wali_murid;
$this->params['breadcrumbs'][] = ['label' => 'Wali Murid', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wali-murid-view">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                                                                    
                            <?= Html::a('Update', ['update', 'id' => $model->id_wali_murid], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'id' => $model->id_wali_murid], [
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
                        'id_wali_murid',
        [
            'attribute' => 'pekerjaan.id_pekerjaan',
            'label' => 'Id Pekerjaan',
        ],
        [
            'attribute' => 'agama.agama',
            'label' => 'Id Agama',
        ],
        'nama_wali_murid',
        'tempat_lahir_wali_murid',
        'tanggal_lahir_wali_murid',
        'jenis_kelamin_wali_murid',
        'alamat_rumah_wali_murid:ntext',
        'no_hp_wali_murid',
                    ];
                    echo DetailView::widget([
                        'model' => $model,
                        'attributes' => $gridColumn
                    ]);
                ?>
                    <!-- </div> -->
                                
                    <div class="pt-3">
                        <?php
                        if($providerSiswa->totalCount){
                            $gridColumnSiswa = [
                                ['class' => 'yii\grid\SerialColumn'],
                                    'id_siswa',
                        [
                'attribute' => 'agama.agama',
                'label' => 'Id Agama'
            ],
            'nis',
            'nama_siswa',
            'tempat_lahir_siswa',
            'tanggal_lahir_siswa',
            'jenis_kelamin_siswa',
            'alamat_rumah_siswa:ntext',
            'alamat_domisili_siswa:ntext',
            'no_hp_siswa',
            'foto_siswa',
                            ];
                            echo Gridview::widget([
                                'dataProvider' => $providerSiswa,
                                'pjax' => true,
                                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-siswa']],
                                'panel' => [
                                    //'type' => GridView::TYPE_PRIMARY,
                                    'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Siswa'),
                                ],
                                                        'export' => false,
                                                        'columns' => $gridColumnSiswa
                            ]);
                        }
                        ?>

                    </div>
                                                                            <div class="row">
                        <h4>Agama<?= ' '. Html::encode($this->title) ?></h4>
                    </div>
                    <?php 
                    $gridColumnAgama = [
                            'agama',
                        ];
                        echo DetailView::widget([
                            'model' => $model->agama,
                            'attributes' => $gridColumnAgama                        ]);
                        ?>
                                                                            <div class="row">
                        <h4>Pekerjaan<?= ' '. Html::encode($this->title) ?></h4>
                    </div>
                    <?php 
                    $gridColumnPekerjaan = [
                            'nama_pekerjaan',
                        ];
                        echo DetailView::widget([
                            'model' => $model->pekerjaan,
                            'attributes' => $gridColumnPekerjaan                        ]);
                        ?>
                                                        </div>
            </div>
        </div>
    </div>

</div>
