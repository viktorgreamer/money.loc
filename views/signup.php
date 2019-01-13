<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */
?>
<div class="signup">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'first_name') ?>
        <?= $form->field($model, 'last_name') ?>
        <?= $form->field($model, 'address_line1') ?>
        <?= $form->field($model, 'City') ?>
        <?= $form->field($model, 'State') ?>
        <?= $form->field($model, 'postal') ?>
        <?= $form->field($model, 'country_id') ?>
        <?= $form->field($model, 'lg') ?>
        <?= $form->field($model, 'phone') ?>
        <?= $form->field($model, 'birthday') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'auth_key') ?>
        <?= $form->field($model, 'password_hash') ?>
        <?= $form->field($model, 'password_reset_token') ?>
        <?= $form->field($model, 'status') ?>
        <?= $form->field($model, 'created_at') ?>
        <?= $form->field($model, 'updated_at') ?>
        <?= $form->field($model, 'company_name') ?>
        <?= $form->field($model, 'address_line2') ?>
        <?= $form->field($model, 'add_contacts') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- signup -->
