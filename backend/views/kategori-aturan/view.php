<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\KategoriAturan */

$this->title = $model->kategori_aturan;
$this->params['breadcrumbs'][] = ['label' => 'Kategori Aturan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-aturan-view">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                                                                    
                            <?= Html::a('Update', ['update', 'id' => $model->id_kategori], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'id' => $model->id_kategori], [
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
                        ['attribute' => 'id_kategori', 'visible' => false],
        'kategori_aturan',
                    ];
                    echo DetailView::widget([
                        'model' => $model,
                        'attributes' => $gridColumn
                    ]);
                ?>
                    <!-- </div> -->
                                                    
                    <div class="pt-3">
                        <?php
                        if($providerAturan->totalCount){
                            $gridColumnAturan = [
                                ['class' => 'yii\grid\SerialColumn'],
                                    ['attribute' => 'id_aturan', 'visible' => false],
            ['attribute' => 'id_kategori', 'visible' => false],
            ['attribute' => 'id_tindakan', 'visible' => false],
            'pasal',
            'uraian_aturan:ntext',
            'point_aturan',
                            ];
                            echo Gridview::widget([
                                'dataProvider' => $providerAturan,
                                'pjax' => true,
                                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-aturan']],
                                'panel' => [
                                    //'type' => GridView::TYPE_PRIMARY,
                                    'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Aturan'),
                                ],
                                                        'export' => false,
                                                        'columns' => $gridColumnAturan
                            ]);
                        }
                        ?>

                    </div>
                                                        </div>
            </div>
        </div>
    </div>

</div>
