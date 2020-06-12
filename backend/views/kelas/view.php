<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Kelas */

$this->title = $model->namaKelas->nama_kelas;
$this->params['breadcrumbs'][] = ['label' => 'Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-view">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">

                    <?=Html::a('Update', ['update', 'id' => $model->id_kelas], ['class' => 'btn btn-primary'])?>
                    <?=Html::a('Delete', ['delete', 'id' => $model->id_kelas], [
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
                        ['attribute' => 'id_kelas', 'visible' => false],
                        [
                            'attribute' => 'nama_kelas',
                            'label' => 'Kelas',
                            'value' => function($model){
                                return $model->namaKelas->nama_kelas;
                            }
                        ],
                        [
                            'attribute' => 'waliKelas.id_wali_kelas',
                            'label' => 'Wali Kelas',
                            'value' => function($model){
                                return $model->waliKelas->pegawai->nama_pegawai;
                            }
                        ],
                    ];
                    echo DetailView::widget([
                        'model' => $model,
                        'attributes' => $gridColumn,
                    ]);
                    ?>

                    <div class="pt-3">
                        <?php
                        if ($providerOnKelasSiswa->totalCount) {
                            $gridColumnOnKelasSiswa = [
                                ['class' => 'yii\grid\SerialColumn'],
                                ['attribute' => 'id_kelas', 'visible' => false],
                                [
                                    'attribute' => 'siswa.id_siswa',
                                    'label' => 'Id Siswa',
                                ],
                            ];
                            echo Gridview::widget([
                                'dataProvider' => $providerOnKelasSiswa,
                                'pjax' => true,
                                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-on-kelas-siswa']],
                                'panel' => [
                                    //'type' => GridView::TYPE_PRIMARY,
                                    'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('On Kelas Siswa'),
                                ],
                                'export' => false,
                                'columns' => $gridColumnOnKelasSiswa,
                            ]);
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>