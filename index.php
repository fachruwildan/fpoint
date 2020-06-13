<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\WaliMuridSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Wali Murid';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="wali-murid-index">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">

                                            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    
                        <p>
                            <?= Html::a('Create Wali Murid', ['create'], ['class' => 'btn btn-success']) ?>
                                                <?= Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button']) ?>
                                            </p>
                                            <div class="search-form" style="display:none">
                            <?=  $this->render('_search', ['model' => $searchModel]); ?>
                        </div>
                                        </div>
                <div class="box-body">
                                        <?php 
                        $gridColumn = [
                            ['class' => 'yii\grid\SerialColumn'],
                                        		                            'id_wali_murid',
		                    		                            [
                'attribute' => 'id_pekerjaan',
                'label' => 'Id Pekerjaan',
                'value' => function($model){                   
                    return $model->pekerjaan->id_pekerjaan;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\Pekerjaan::find()->asArray()->all(), 'id_pekerjaan', 'id_pekerjaan'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Pekerjaan', 'id' => 'grid-wali-murid-search-id_pekerjaan']
            ],
		                    		                            [
                'attribute' => 'id_agama',
                'label' => 'Id Agama',
                'value' => function($model){                   
                    return $model->agama->agama;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\Agama::find()->asArray()->all(), 'id_agama', 'agama'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Agama', 'id' => 'grid-wali-murid-search-id_agama']
            ],
		                    		                            'nama_wali_murid',
		                    		                            'tempat_lahir_wali_murid',
		                    		                            'tanggal_lahir_wali_murid',
		                    		                            'jenis_kelamin_wali_murid',
		                    		                            'alamat_rumah_wali_murid:ntext',
		                    		                            'no_hp_wali_murid',
		                                                [
                                'class' => 'yii\grid\ActionColumn',
                                                ],
                        ];
                                            ?>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
        'columns' => $gridColumn,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-wali-murid']],
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
