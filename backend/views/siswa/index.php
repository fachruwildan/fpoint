<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\SiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\helpers\Html;

$this->title = 'Siswa';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="siswa-index">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">

                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <p>
                        <?=Html::a('Create Siswa', ['create'], ['class' => 'btn btn-success'])?>
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
                            ['attribute' => 'id_siswa', 'visible' => false],
                            'nis',
                            'nama_siswa',
                            [
                                'attribute' => 'id_agama',
                                'label' => 'Agama',
                                'value' => function ($model) {
                                    return $model->agama->agama;
                                },
                                'filterType' => GridView::FILTER_SELECT2,
                                'filter' => \yii\helpers\ArrayHelper::map(\common\models\Agama::find()->asArray()->all(), 'id_agama', 'agama'),
                                'filterWidgetOptions' => [
                                    'pluginOptions' => ['allowClear' => true],
                                ],
                                'filterInputOptions' => ['placeholder' => 'Agama', 'id' => 'grid-siswa-search-id_agama'],
                            ],
                            // 'tempat_lahir_siswa',
                            // 'tanggal_lahir_siswa',
                            [
                                'attribute' => 'jenis_kelamin_siswa',
                                'value' => function($model){
                                    return ($model->jenis_kelamin_siswa == 'L') ? 'Laki-laki' : 'Perempuan';
                                }
                            ],
                            // 'alamat_rumah_siswa:ntext',
                            // 'alamat_domisili_siswa:ntext',
                            'no_hp_siswa',
                            // 'foto_siswa',
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
                        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-siswa']],
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