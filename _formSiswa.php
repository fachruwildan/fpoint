<div class="form-group" id="add-siswa">
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
    'formName' => 'Siswa',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'id_siswa' => ['type' => TabularForm::INPUT_HIDDEN],
        'id_agama' => [
            'label' => 'Agama',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\Agama::find()->orderBy('agama')->asArray()->all(), 'id_agama', 'agama'),
                'options' => ['placeholder' => 'Choose Agama'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'nis' => ['type' => TabularForm::INPUT_TEXT],
        'nama_siswa' => ['type' => TabularForm::INPUT_TEXT],
        'tempat_lahir_siswa' => ['type' => TabularForm::INPUT_TEXT],
        'tanggal_lahir_siswa' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Tanggal Lahir Siswa',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'jenis_kelamin_siswa' => ['type' => TabularForm::INPUT_TEXT],
        'alamat_rumah_siswa' => ['type' => TabularForm::INPUT_TEXTAREA],
        'alamat_domisili_siswa' => ['type' => TabularForm::INPUT_TEXTAREA],
        'no_hp_siswa' => ['type' => TabularForm::INPUT_TEXT],
        'foto_siswa' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowSiswa(' . $key . '); return false;', 'id' => 'siswa-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Siswa', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowSiswa()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

