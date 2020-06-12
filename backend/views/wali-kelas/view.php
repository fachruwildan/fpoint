<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WaliKelas */

$this->title = $model->pegawai->nama_pegawai;
$this->params['breadcrumbs'][] = ['label' => 'Wali Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wali-kelas-view">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">

                    <?=Html::a('Update', ['update', 'id' => $model->id_wali_kelas], ['class' => 'btn btn-primary'])?>
                    <?=Html::a('Delete', ['delete', 'id' => $model->id_wali_kelas], [
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
                            ['attribute' => 'id_wali_kelas', 'visible' => false],
                            [
                                'attribute' => 'nama_kelas',
                                'label' => 'Kelas',
                                'value' => function($model){
                                    return $model->kelas->namaKelas->nama_kelas;
                                }
                            ],
                        ];
                        echo DetailView::widget([
                            'model' => $model,
                            'attributes' => $gridColumn,
                        ]);
                        ?>
                    <div class="pt-3">
                        <h3><b> Biodata <?=' ' . Html::encode($this->title)?> </b></h3>
                    </div>
                    <?php
                        $gridColumnPegawai = [
                            [
                                'attribute' => 'id_agama',
                                'value' => function($model){
                                    return $model->agama->agama;
                                }
                            ],
                            'nama_pegawai',
                            'alamat_pegawai',
                            [
                                'attribute' => 'jenis_kelamin_pegawai',
                                'value' => function($model){
                                    return ($model->jenis_kelamin_pegawai == 'L') ? 'Laki-laki' : 'Perempuan';
                                }
                            ],
                            'no_hp_pegawai',
                            'status_kepegawaian',
                            'jabatan_pegawai',
                            'foto_pegawai',
                        ];
                        echo DetailView::widget([
                            'model' => $model->pegawai,
                            'attributes' => $gridColumnPegawai]);
                        ?>
                </div>
            </div>
        </div>
    </div>

</div>