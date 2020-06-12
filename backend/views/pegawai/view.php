<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Pegawai */

$this->title = $model->nama_pegawai;
$this->params['breadcrumbs'][] = ['label' => 'Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-view">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">

                            <?= Html::a('Update', ['update', 'id' => $model->id_pegawai], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'id' => $model->id_pegawai], [
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
                            ['attribute' => 'id_pegawai', 'visible' => false],
                            ['attribute' => 'id_agama', 'visible' => false],
                            'nama_pegawai',
                            'alamat_pegawai:ntext',
                            [
                                'attribute' => 'id_agama',
                                'value' => function($model) {
                                    return $model->agama->agama;
                                }
                            ],
                            [
                                'attribute' => 'jenis_kelamin_pegawai',
                                'value' => function($model) {
                                    return ($model->jenis_kelamin_pegawai == 'L') ? 'Laki-laki' : 'Perempuan';
                                }
                            ],
                            'no_hp_pegawai',
                            'status_kepegawaian',
                            'jabatan_pegawai',
                            'foto_pegawai',
                        ];
                        echo DetailView::widget([
                            'model' => $model,
                            'attributes' => $gridColumn
                        ]);
                    ?>

                    <div class="pt-3">
                        <?php
                        if($providerUser->totalCount){
                            $gridColumnUser = [
                                ['class' => 'yii\grid\SerialColumn'],
                                ['attribute' => 'id', 'visible' => false],
                                ['attribute' => 'id_pegawai', 'visible' => false],
                                'username',
                                // 'auth_key',
                                // 'password_hash',
                                // 'password_reset_token',
                                'email:email',
                                [
                                    'attribute' => 'status',
                                    'value' => function($model){
                                        return ($model->status == 10) ? 'Aktif' : 'Tidak Aktif';
                                    }
                                ],
                            ];
                            echo Gridview::widget([
                                'dataProvider' => $providerUser,
                                'pjax' => true,
                                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-user']],
                                'panel' => [
                                    //'type' => GridView::TYPE_PRIMARY,
                                    'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('User'),
                                ],
                                'export' => false,
                                'columns' => $gridColumnUser
                            ]);
                        }
                        ?>

                    </div>

                    <div class="pt-3">
                        <?php
                        if($providerWaliKelas->totalCount){
                            $gridColumnWaliKelas = [
                                ['class' => 'yii\grid\SerialColumn'],
                                ['attribute' => 'id_wali_kelas', 'visible' => false],
                                ['attribute' => 'id_pegawai', 'visible' => false],
                            ];
                            echo Gridview::widget([
                                'dataProvider' => $providerWaliKelas,
                                'pjax' => true,
                                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-wali-kelas']],
                                'panel' => [
                                    //'type' => GridView::TYPE_PRIMARY,
                                    'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Wali Kelas'),
                                ],
                                'export' => false,
                                'columns' => $gridColumnWaliKelas
                            ]);
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
