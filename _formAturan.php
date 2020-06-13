<div class="form-group" id="add-aturan">
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
    'formName' => 'Aturan',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'id_aturan' => ['type' => TabularForm::INPUT_HIDDEN],
        'id_kategori' => [
            'label' => 'Kategori aturan',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\KategoriAturan::find()->orderBy('kategori_aturan')->asArray()->all(), 'id_kategori', 'kategori_aturan'),
                'options' => ['placeholder' => 'Choose Kategori aturan'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'pasal' => ['type' => TabularForm::INPUT_TEXT],
        'uraian_aturan' => ['type' => TabularForm::INPUT_TEXTAREA],
        'point_aturan' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowAturan(' . $key . '); return false;', 'id' => 'aturan-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Aturan', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowAturan()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

