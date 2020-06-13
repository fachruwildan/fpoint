<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WaliMurid */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Siswa', 
        'relID' => 'siswa', 
        'value' => \yii\helpers\Json::encode($model->siswas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="wali-murid-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id_wali_murid')->textInput(['placeholder' => 'Id Wali Murid']) ?>

    <?= $form->field($model, 'id_pekerjaan')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Pekerjaan::find()->orderBy('id_pekerjaan')->asArray()->all(), 'id_pekerjaan', 'id_pekerjaan'),
        'options' => ['placeholder' => 'Choose Pekerjaan'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'id_agama')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Agama::find()->orderBy('id_agama')->asArray()->all(), 'id_agama', 'agama'),
        'options' => ['placeholder' => 'Choose Agama'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'nama_wali_murid')->textInput(['maxlength' => true, 'placeholder' => 'Nama Wali Murid']) ?>

    <?= $form->field($model, 'tempat_lahir_wali_murid')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir Wali Murid']) ?>

    <?= $form->field($model, 'tanggal_lahir_wali_murid')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Tanggal Lahir Wali Murid',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'jenis_kelamin_wali_murid')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'alamat_rumah_wali_murid')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'no_hp_wali_murid')->textInput(['maxlength' => true, 'placeholder' => 'No Hp Wali Murid']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Siswa'),
            'content' => $this->render('_formSiswa', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->siswas),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
