<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use borales\extensions\phoneInput\PhoneInput;

/* @var $this yii\web\View */
/* @var $model common\models\Siswa */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Absensi', 
        'relID' => 'absensi', 
        'value' => \yii\helpers\Json::encode($model->absensis),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'AkumulasiPoint', 
        'relID' => 'akumulasi-point', 
        'value' => \yii\helpers\Json::encode($model->akumulasiPoints),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Pelanggaran', 
        'relID' => 'pelanggaran', 
        'value' => \yii\helpers\Json::encode($model->pelanggarans),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Prestasi', 
        'relID' => 'prestasi', 
        'value' => \yii\helpers\Json::encode($model->prestasis),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Sp', 
        'relID' => 'sp', 
        'value' => \yii\helpers\Json::encode($model->sps),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="siswa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id_siswa', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'nis')->textInput(['maxlength' => true, 'placeholder' => 'NIS']) ?>

    <?= $form->field($model, 'nama_siswa')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>

    <?= $form->field($model, 'tempat_lahir_siswa')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir']) ?>

    <?= $form->field($model, 'tanggal_lahir_siswa')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Pilih Tanggal Lahir',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'jenis_kelamin_siswa')->dropDownList([ 'L' => 'Laki-laki', 'P' => 'Perempuan', ], ['prompt' => 'Pilih Jenis Kelamin']) ?>

    <?= $form->field($model, 'alamat_rumah_siswa')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'alamat_domisili_siswa')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_agama')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Agama::find()->orderBy('id_agama')->asArray()->all(), 'id_agama', 'agama'),
        'options' => ['placeholder' => 'Pilih Agama'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'no_hp_siswa')->widget(PhoneInput::className(),[
        'jsOptions' => [
            'preferredCountries' => ['id'],
        ]
    ]) ?>

    <?= $form->field($model, 'id_wali_murid')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\WaliMurid::find()->orderBy('id_wali_murid')->asArray()->all(), 'id_wali_murid', 'nama_wali_murid'),
        'options' => ['placeholder' => 'Pilih Wali murid'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'foto_siswa')->textInput(['maxlength' => true, 'placeholder' => 'Foto']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Absensi'),
            'content' => $this->render('_formAbsensi', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->absensis),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('AkumulasiPoint'),
            'content' => $this->render('_formAkumulasiPoint', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->akumulasiPoints),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Pelanggaran'),
            'content' => $this->render('_formPelanggaran', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->pelanggarans),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Prestasi'),
            'content' => $this->render('_formPrestasi', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->prestasis),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Sp'),
            'content' => $this->render('_formSp', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->sps),
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
