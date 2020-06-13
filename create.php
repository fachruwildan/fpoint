<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Sanksi */

$this->title = 'Create Sanksi';
$this->params['breadcrumbs'][] = ['label' => 'Sanksi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sanksi-create">
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
