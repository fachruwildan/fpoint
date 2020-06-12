<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\WaliKelasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\helpers\Html;

$this->title = 'Wali Kelas';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="wali-kelas-index">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <p>
                        <?=Html::a('Create Wali Kelas', ['create'], ['class' => 'btn btn-success'])?>
                    </p>
                </div>
                <div class="box-body">
                    <?php
                        $gridColumn = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id_wali_kelas', 'visible' => false],
                            [
                                'attribute' => 'id_pegawai',
                                'label' => 'Nama',
                                'value' => function ($model) {
                                    return $model->pegawai->nama_pegawai;
                                },
                                'filterType' => GridView::FILTER_SELECT2,
                                'filter' => \yii\helpers\ArrayHelper::map(\common\models\Pegawai::find()->asArray()->all(), 'id_pegawai', 'nama_pegawai'),
                                'filterWidgetOptions' => [
                                    'pluginOptions' => ['allowClear' => true],
                                ],
                                'filterInputOptions' => ['placeholder' => 'Pegawai', 'id' => 'grid-wali-kelas-search-id_pegawai'],
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{view} {delete}'
                            ],
                        ];
                        ?>
                    <?=GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => $gridColumn,
                        'pjax' => true,
                        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-wali-kelas']],
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