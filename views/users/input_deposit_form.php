<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $inputDepositForm app\models\forms\InputDepositForm */
/* @var $form ActiveForm */
?>
<div class="input_deposit_form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($inputDepositForm, 'value') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- input_deposit_form -->
