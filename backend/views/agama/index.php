<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\AgamaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Agama';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="agama-index">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">

                                            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    
                        <p>
                            <?= Html::a('Create Agama', ['create'], ['class' => 'btn btn-success']) ?>
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
                                                                    ['attribute' => 'id_agama', 'visible' => false],
                                                'agama',
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
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-agama']],
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
