<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MyPaymentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payments-search">
<div class="row">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="col-lg-3">
        <?= $form->field($model, 'id') ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'type')->dropDownList([0 => 'Any'] +  $model->mapTypeText()) ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'status')->dropDownList([0 => 'Any'] +  $model->mapStatuses()) ?>
    </div> <div class="col-lg-3">
        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
         </div>

    </div> <?php ActiveForm::end(); ?>
</div>






</div>
