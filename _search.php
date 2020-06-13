<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WaliMuridSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-wali-murid-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

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

    <?php /* echo $form->field($model, 'tanggal_lahir_wali_murid')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Tanggal Lahir Wali Murid',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'jenis_kelamin_wali_murid')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => '']) */ ?>

    <?php /* echo $form->field($model, 'alamat_rumah_wali_murid')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'no_hp_wali_murid')->textInput(['maxlength' => true, 'placeholder' => 'No Hp Wali Murid']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
