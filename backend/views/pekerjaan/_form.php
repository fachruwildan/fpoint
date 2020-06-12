<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pekerjaan */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="pekerjaan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id_pekerjaan', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'nama_pekerjaan')->textInput(['maxlength' => true, 'placeholder' => 'Nama Pekerjaan']) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
