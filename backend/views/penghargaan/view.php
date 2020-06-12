<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Penghargaan */

$this->title = $model->uraian_penghargaan;
$this->params['breadcrumbs'][] = ['label' => 'Penghargaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penghargaan-view">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">

                    <?=Html::a('Update', ['update', 'id' => $model->id_penghargaan], ['class' => 'btn btn-primary'])?>
                    <?=Html::a('Delete', ['delete', 'id' => $model->id_penghargaan], [
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
                            ['attribute' => 'id_penghargaan', 'visible' => false],
                            'uraian_penghargaan:ntext',
                            [ 
                                'attribute' => 'point_penghargaan',
                                'value' => function($model) {
                                    return $model->point_penghargaan . " Point";
                                }
                            ],
                        ];
                        echo DetailView::widget([
                            'model' => $model,
                            'attributes' => $gridColumn,
                        ]);
                        ?>
                    <!-- </div> -->

                    <div class="pt-3">
                        <?php
                            if ($providerPrestasi->totalCount) {
                                $gridColumnPrestasi = [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    [
                                        'attribute' => 'siswa.id_siswa',
                                        'label' => 'Id Siswa',
                                    ],
                                    ['attribute' => 'id_penghargaan', 'visible' => false],
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
                </div>
            </div>
        </div>
    </div>

</div>