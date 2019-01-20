<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <?= $form->field($model, 'address_line1')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <?= $form->field($model, 'birthday')->widget(\kartik\date\DatePicker::className(), [
                'type' => \kartik\date\DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]]); ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <?= $form->field($model, 'lg')->dropDownList(\app\models\User::mapLang()) ?>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <?= $form->field($model, 'country_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Contries::find()->orderBy('name')->all(), 'id', 'name')); ?>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">

            <?= $form->field($model, 'postal')->textInput() ?>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <?= $form->field($model, 'address_line2')->textInput(['maxlength' => true]) ?>

        </div>
    </div>

















    <?= $form->field($model, 'add_contacts')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
