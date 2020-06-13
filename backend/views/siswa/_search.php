<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SiswaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-siswa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_siswa', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'id_wali_murid')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\WaliMurid::find()->orderBy('id_wali_murid')->asArray()->all(), 'id_wali_murid', 'id_wali_murid'),
        'options' => ['placeholder' => 'Choose Wali murid'],
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

    <?= $form->field($model, 'nis')->textInput(['maxlength' => true, 'placeholder' => 'Nis']) ?>

    <?= $form->field($model, 'nama_siswa')->textInput(['maxlength' => true, 'placeholder' => 'Nama Siswa']) ?>

    <?php /* echo $form->field($model, 'tempat_lahir_siswa')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir Siswa']) */ ?>

    <?php /* echo $form->field($model, 'tanggal_lahir_siswa')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Tanggal Lahir Siswa',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'jenis_kelamin_siswa')->textInput(['maxlength' => true, 'placeholder' => 'Jenis Kelamin Siswa']) */ ?>

    <?php /* echo $form->field($model, 'alamat_rumah_siswa')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'alamat_domisili_siswa')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'no_hp_siswa')->textInput(['maxlength' => true, 'placeholder' => 'No Hp Siswa']) */ ?>

    <?php /* echo $form->field($model, 'foto_siswa')->textInput(['maxlength' => true, 'placeholder' => 'Foto Siswa']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
