<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Sanksi */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'AkumulasiPoint', 
        'relID' => 'akumulasi-point', 
        'value' => \yii\helpers\Json::encode($model->akumulasiPoints),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="sanksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id_sanksi')->textInput(['placeholder' => 'Id Sanksi']) ?>

    <?= $form->field($model, 'uraian')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'minimum_point')->textInput(['placeholder' => 'Minimum Point']) ?>

    <?= $form->field($model, 'maximum_point')->textInput(['placeholder' => 'Maximum Point']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('AkumulasiPoint'),
            'content' => $this->render('_formAkumulasiPoint', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->akumulasiPoints),
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
