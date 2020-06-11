<div class="form-group" id="add-pegawai">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'Pegawai',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id_pegawai" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'nama_pegawai' => ['type' => TabularForm::INPUT_TEXT],
        'alamat_pegawai' => ['type' => TabularForm::INPUT_TEXTAREA],
        'jenis_kelamin_pegawai' => ['type' => TabularForm::INPUT_TEXT],
        'no_hp_pegawai' => ['type' => TabularForm::INPUT_TEXT],
        'status_kepegawaian' => ['type' => TabularForm::INPUT_TEXT],
        'jabatan_pegawai' => ['type' => TabularForm::INPUT_TEXT],
        'foto_pegawai' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowPegawai(' . $key . '); return false;', 'id' => 'pegawai-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Pegawai', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowPegawai()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

