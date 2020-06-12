<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\KelasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\helpers\Html;

$this->title = 'Kelas';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="kelas-index">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <p>
                        <?=Html::a('Create Kelas', ['create'], ['class' => 'btn btn-success'])?>
                        <?=Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button'])?>
                    </p>
                    <div class="search-form" style="display:none">
                        <?=$this->render('_search', ['model' => $searchModel]);?>
                    </div>
                </div>
                <div class="box-body">
                    <?php
                        $gridColumn = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id_kelas', 'visible' => false],
                            [
                                'attribute' => 'nama_kelas',
                                'label' => 'Kelas',
                                'value' => function ($model) {
                                    if ($model->namaKelas) {return $model->namaKelas->nama_kelas;} else {return null;}
                                },
                                'filterType' => GridView::FILTER_SELECT2,
                                'filter' => \yii\helpers\ArrayHelper::map(\common\models\NamaKelas::find()->asArray()->all(), 'id_kelas', 'nama_kelas'),
                                'filterWidgetOptions' => [
                                    'pluginOptions' => ['allowClear' => true],
                                ],
                                'filterInputOptions' => ['placeholder' => 'Jurusan', 'id' => 'grid-kelas-search-nama_kelas'],
                            ],
                            [
                                'attribute' => 'id_wali_kelas',
                                'label' => 'Wali Kelas',
                                'value' => function ($model) {
                                    if ($model->waliKelas) {return $model->waliKelas->pegawai->nama_pegawai;} else {return null;}
                                },
                                'filterType' => GridView::FILTER_SELECT2,
                                'filter' => \yii\helpers\ArrayHelper::map(\common\models\WaliKelas::find()->joinWith('pegawai')->asArray()->all(), 'id_wali_kelas', 'pegawai.nama_pegawai'),
                                'filterWidgetOptions' => [
                                    'pluginOptions' => ['allowClear' => true],
                                ],
                                'filterInputOptions' => ['placeholder' => 'Wali kelas', 'id' => 'grid-kelas-search-id_wali_kelas'],
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                            ],
                        ];
                        ?>
                    <?=GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => $gridColumn,
                        'pjax' => true,
                        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-kelas']],
                        'panel' => [
                            //'type' => GridView::TYPE_PRIMARY,
                            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
                        ],
                        'export' => false,
                        // your toolbar can include the additional full export menu
                        'toolbar' => [
                            '{export}',
                            ExportMenu::widget([
                                'dataProvider' => $dataProvider,
                                'columns' => $gridColumn,
                                'target' => ExportMenu::TARGET_BLANK,
                                'fontAwesome' => true,
                                'dropdownOptions' => [
                                    'label' => 'Full',
                                    'class' => 'btn btn-default',
                                    'itemsBefore' => [
                                        '<li class="dropdown-header">Export All Data</li>',
                                    ],
                                ],
                                'exportConfig' => [
                                    ExportMenu::FORMAT_PDF => false,
                                ],
                            ]),
                        ],
                    ]);?>
                </div>
            </div>
        </div>
    </div>

</div>