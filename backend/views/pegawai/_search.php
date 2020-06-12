<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PegawaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-pegawai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pegawai', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'id_agama', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'nama_pegawai')->textInput(['maxlength' => true, 'placeholder' => 'Nama Pegawai']) ?>

    <?= $form->field($model, 'alamat_pegawai')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jenis_kelamin_pegawai')->dropDownList([ 'L' => 'Laki-laki', 'P' => 'Perempuan', ], ['prompt' => 'Jenis Kelamin']) ?>

    <?php /* echo $form->field($model, 'no_hp_pegawai')->textInput(['maxlength' => true, 'placeholder' => 'No Hp Pegawai']) */ ?>

    <?php /* echo $form->field($model, 'status_kepegawaian')->textInput(['maxlength' => true, 'placeholder' => 'Status Kepegawaian']) */ ?>

    <?php /* echo $form->field($model, 'jabatan_pegawai')->textInput(['maxlength' => true, 'placeholder' => 'Jabatan Pegawai']) */ ?>

    <?php /* echo $form->field($model, 'foto_pegawai')->textInput(['maxlength' => true, 'placeholder' => 'Foto Pegawai']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
