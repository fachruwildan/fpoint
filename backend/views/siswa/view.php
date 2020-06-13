<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Siswa */

$this->title = $model->nama_siswa;
$this->params['breadcrumbs'][] = ['label' => 'Siswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siswa-view">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">

                    <?=Html::a('Update', ['update', 'id' => $model->id_siswa], ['class' => 'btn btn-primary'])?>
                    <?=Html::a('Delete', ['delete', 'id' => $model->id_siswa], [
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
                            ['attribute' => 'id_siswa', 'visible' => false],
                            'nis',
                            'nama_siswa',
                            'tempat_lahir_siswa',
                            'tanggal_lahir_siswa',
                            [
                                'attribute' => 'jenis_kelamin_siswa',
                                'label' => 'Jenis Kelamin',
                                'value' => function($model) { return ($model->jenis_kelamin_siswa == 'L') ? 'Laki-laki' : 'Perempuan'; }
                            ],
                            'alamat_rumah_siswa:ntext',
                            'alamat_domisili_siswa:ntext',
                            'no_hp_siswa',
                            [
                                'attribute' => 'waliMurid.id_wali_murid',
                                'label' => 'Wali Murid',
                                'value' => function($model) { return $model->idWaliMur->nama_wali_murid; }
                            ],
                            [
                                'attribute' => 'agama.agama',
                                'label' => 'Agama',
                            ],
                            'foto_siswa',
                        ];
                        echo DetailView::widget([
                            'model' => $model,
                            'attributes' => $gridColumn,
                        ]);
                        ?>
                    <!-- </div> -->

                    <div class="pt-3">
                        <?php
                            if ($providerAbsensi->totalCount) {
                                $gridColumnAbsensi = [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    ['attribute' => 'id_siswa', 'visible' => false],
                                    [
                                        'attribute' => 'statusAbsensi.id_status_absensi',
                                        'label' => 'Id Status Absensi',
                                    ],
                                    'tanggal',
                                ];
                                echo Gridview::widget([
                                    'dataProvider' => $providerAbsensi,
                                    'pjax' => true,
                                    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-absensi']],
                                    'panel' => [
                                        //'type' => GridView::TYPE_PRIMARY,
                                        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Absensi'),
                                    ],
                                    'export' => false,
                                    'columns' => $gridColumnAbsensi,
                                ]);
                            }
                            ?>

                    </div>

                    <div class="pt-3">
                        <?php
                            if ($providerAkumulasiPoint->totalCount) {
                                $gridColumnAkumulasiPoint = [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    ['attribute' => 'id_siswa', 'visible' => false],
                                    [
                                        'attribute' => 'sanksi.id_sanksi',
                                        'label' => 'Id Sanksi',
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
                                    'columns' => $gridColumnAkumulasiPoint,
                                ]);
                            }
                            ?>

                    </div>
                    <div class="pt-3">
                        <?php
                            if ($providerPelanggaran->totalCount) {
                                $gridColumnPelanggaran = [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    ['attribute' => 'id_siswa', 'visible' => false],
                                    [
                                        'attribute' => 'aturan.id_aturan',
                                        'label' => 'Id Aturan',
                                    ],
                                    'tanggal',
                                ];
                                echo Gridview::widget([
                                    'dataProvider' => $providerPelanggaran,
                                    'pjax' => true,
                                    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-pelanggaran']],
                                    'panel' => [
                                        //'type' => GridView::TYPE_PRIMARY,
                                        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Pelanggaran'),
                                    ],
                                    'export' => false,
                                    'columns' => $gridColumnPelanggaran,
                                ]);
                            }
                            ?>

                    </div>

                    <div class="pt-3">
                        <?php
                            if ($providerPrestasi->totalCount) {
                                $gridColumnPrestasi = [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    ['attribute' => 'id_siswa', 'visible' => false],
                                    [
                                        'attribute' => 'penghargaan.id_penghargaan',
                                        'label' => 'Id Penghargaan',
                                    ],
                                    'tanggal',
                                ];
                                echo Gridview::widget([
                                    'dataProvider' => $providerPrestasi,
                                    'pjax' => true,
                                    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-prestasi']],
                                    'panel' => [
                                        //'type' => GridView::TYPE_PRIMARY,
                                        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Prestasi'),
                                    ],
                                    'export' => false,
                                    'columns' => $gridColumnPrestasi,
                                ]);
                            }
                            ?>

                    </div>
                    <div class="row">
                        <h4>WaliMurid<?=' ' . Html::encode($this->title)?></h4>
                    </div>
                    <?php
                        $gridColumnWaliMurid = [
                            'id_pekerjaan',
                            [
                                'attribute' => 'agama.agama',
                                'label' => 'Id Agama',
                            ],
                            'nama_wali_murid',
                            'tempat_lahir_wali_murid',
                            'tanggal_lahir_wali_murid',
                            'jenis_kelamin_wali_murid',
                            'alamat_rumah_wali_murid',
                            'no_hp_wali_murid',
                        ];
                        echo DetailView::widget([
                            'model' => $model->idWaliMur,
                            'attributes' => $gridColumnWaliMurid]);
                        ?>

                    <div class="pt-3">
                        <?php
                            if ($providerSp->totalCount) {
                                $gridColumnSp = [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    'id_sp',
                                    ['attribute' => 'id_siswa', 'visible' => false],
                                    'tanggal_sp',
                                    'jml_point_pelanggaran',
                                ];
                                echo Gridview::widget([
                                    'dataProvider' => $providerSp,
                                    'pjax' => true,
                                    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sp']],
                                    'panel' => [
                                        //'type' => GridView::TYPE_PRIMARY,
                                        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Sp'),
                                    ],
                                    'export' => false,
                                    'columns' => $gridColumnSp,
                                ]);
                            }
                            ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>