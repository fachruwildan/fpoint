<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Agama */

$this->title = $model->agama;
$this->params['breadcrumbs'][] = ['label' => 'Agama', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agama-view">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <?= Html::a('Update', ['update', 'id' => $model->id_agama], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id_agama], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ])
                        ?>
                </div>
                <div class="box-body">
                    <?php 
                    $gridColumn = [
                        ['attribute' => 'id_agama', 'visible' => false],
                        'agama',
                            ];
                            echo DetailView::widget([
                                'model' => $model,
                                'attributes' => $gridColumn
                            ]);
                        ?>

                    <div class="pt-3">
                        <?php
                        if($providerPegawai->totalCount){
                            $gridColumnPegawai = [
                                ['class' => 'yii\grid\SerialColumn'],
                                ['attribute' => 'id_pegawai', 'visible' => false],
                                ['attribute' => 'id_agama', 'visible' => false],
                                'nama_pegawai',
                                'alamat_pegawai:ntext',
                                'jenis_kelamin_pegawai',
                                'no_hp_pegawai',
                                'status_kepegawaian',
                                'jabatan_pegawai',
                                'foto_pegawai',
                            ];
                            echo Gridview::widget([
                                'dataProvider' => $providerPegawai,
                                'pjax' => true,
                                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-pegawai']],
                                'panel' => [
                                    //'type' => GridView::TYPE_PRIMARY,
                                    'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Pegawai'),
                                ],
                                'export' => false,
                                'columns' => $gridColumnPegawai
                            ]);
                        }
                        ?>

                    </div>

                    <div class="pt-3">
                        <?php
                        if($providerSiswa->totalCount){
                            $gridColumnSiswa = [
                                ['class' => 'yii\grid\SerialColumn'],
                                ['attribute' => 'id_siswa', 'visible' => false],
                                ['attribute' => 'id_wali_murid', 'visible' => false],
                                ['attribute' => 'id_agama', 'visible' => false],
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

                    <div class="pt-3">
                        <?php
                        if($providerWaliMurid->totalCount){
                            $gridColumnWaliMurid = [
                                ['class' => 'yii\grid\SerialColumn'],
                                ['attribute' => 'id_wali_murid', 'visible' => false],
                                ['attribute' => 'id_pekerjaan', 'visible' => false],
                                ['attribute' => 'id_agama', 'visible' => false],
                                ['attribute' => 'nama_wali_murid', 'visible' => false],
                                ['attribute' => 'tempat_lahir_wali_murid', 'visible' => false],
                                ['attribute' => 'tanggal_lahir_wali_murid', 'visible' => false],
                                ['attribute' => 'jenis_kelamin_wali_murid', 'visible' => false],
                                ['attribute' => 'alamat_rumah_wali_murid', 'visible' => false],
                                ['attribute' => 'no_hp_wali_murid', 'visible' => false],
                            ];
                            echo Gridview::widget([
                                'dataProvider' => $providerWaliMurid,
                                'pjax' => true,
                                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-wali-murid']],
                                'panel' => [
                                    //'type' => GridView::TYPE_PRIMARY,
                                    'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Wali Murid'),
                                ],
                                'export' => false,
                                'columns' => $gridColumnWaliMurid
                            ]);
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>