<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use borales\extensions\phoneInput\PhoneInput;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Pegawai */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'User', 
        'relID' => 'user', 
        'value' => \yii\helpers\Json::encode($model->users),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'WaliKelas', 
        'relID' => 'wali-kelas', 
        'value' => \yii\helpers\Json::encode($model->waliKelas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);

?>

<div class="pegawai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id_pegawai', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>


    <?= $form->field($model, 'nama_pegawai')->textInput(['maxlength' => true, 'placeholder' => 'Nama Pegawai']) ?>

    <?= $form->field($model, 'alamat_pegawai')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jenis_kelamin_pegawai')->dropDownList([ 'L' => 'Laki-laki', 'P' => 'Perempuan', ], ['prompt' => 'Pilih jenis Kelamin']) ?>

    <?= $form->field($model, 'id_agama')->widget(Select2::classname(), [
            'data' => $agama,
            'options' => ['placeholder' => 'Pilih Agama ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>

    <?= $form->field($model, 'no_hp_pegawai')->widget(PhoneInput::className(),[
        'jsOptions' => [
            'preferredCountries' => ['id'],
        ]
    ]) ?>

    <?= $form->field($model, 'status_kepegawaian')->textInput(['maxlength' => true, 'placeholder' => 'Status Kepegawaian']) ?>

    <?= $form->field($model, 'jabatan_pegawai')->textInput(['maxlength' => true, 'placeholder' => 'Jabatan Pegawai']) ?>

    <?= $form->field($model, 'foto_pegawai')->textInput(['maxlength' => true, 'placeholder' => 'Foto Pegawai']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('User'),
            'content' => $this->render('_formUser', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->users),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('WaliKelas'),
            'content' => $this->render('_formWaliKelas', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->waliKelas),
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
