<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $WithdrawalForm app\models\forms\WithdrawalForm */
/* @var $form ActiveForm */
?>
<div class="input_deposit_form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($WithdrawalForm, 'value') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- input_deposit_form -->
