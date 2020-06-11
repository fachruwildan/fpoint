<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Agama */

$this->title = 'Create Agama';
$this->params['breadcrumbs'][] = ['label' => 'Agama', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agama-create">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <div class="box-body">
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

</div>
