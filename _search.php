<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SanksiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-sanksi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sanksi')->textInput(['placeholder' => 'Id Sanksi']) ?>

    <?= $form->field($model, 'uraian')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'minimum_point')->textInput(['placeholder' => 'Minimum Point']) ?>

    <?= $form->field($model, 'maximum_point')->textInput(['placeholder' => 'Maximum Point']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
