<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WaliMurid */

$this->title = 'Create Wali Murid';
$this->params['breadcrumbs'][] = ['label' => 'Wali Murid', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wali-murid-create">
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
