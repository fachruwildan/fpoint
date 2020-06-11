<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Jurusan */

$this->title = $model->jurusan;
$this->params['breadcrumbs'][] = ['label' => 'Jurusan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jurusan-view">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                                                                    
                    <?= Html::a('Update', ['update', 'id' => $model->id_jurusan], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id_jurusan], [
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
                            ['attribute' => 'id_jurusan', 'visible' => false],
                            'jurusan',
                            'kepala_jurusan',
                        ];
                        echo DetailView::widget([
                            'model' => $model,
                            'attributes' => $gridColumn
                        ]);
                    ?>              
                    <div class="pt-3">
                        <?php
                        if($providerKelas->totalCount){
                            $gridColumnKelas = [
                                ['class' => 'yii\grid\SerialColumn'],
                                ['attribute' => 'id_kelas', 'visible' => false],
                                ['attribute' => 'id_jurusan', 'visible' => false],
                                ['attribute' => 'id_wali_kelas', 'visible' => false],
                                'kelas',
                                'grade',
                            ];
                            echo Gridview::widget([
                                'dataProvider' => $providerKelas,
                                'pjax' => true,
                                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-kelas']],
                                'panel' => [
                                    //'type' => GridView::TYPE_PRIMARY,
                                    'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Kelas'),
                                ],
                                'export' => false,
                                'columns' => $gridColumnKelas
                            ]);
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
