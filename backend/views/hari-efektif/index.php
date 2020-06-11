<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\HariEfektifSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Hari Efektif';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="hari-efektif-index">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <div class="box-body">
                    <?php 
                        $gridColumn = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id_hari_efektif', 'visible' => false],
                            'nama_hari_efektif',
                            [
                                'attribute' => 'status_hari_efektif',
                                'value' => function($model) {
                                    if($model->status_hari_efektif == "0") {
                                        return "Tidak Efektif";
                                    }else{
                                        return "Efektif";
                                    }
                                }
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{update}',
                            ],
                        ]; 
                                            ?>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => $gridColumn,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-hari-efektif']],
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
                                        ExportMenu::FORMAT_PDF => false
                                    ]
                                ]) ,
                            ],
                        ]); ?>
                </div>
            </div>
        </div>
    </div>

</div>
