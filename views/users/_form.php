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
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <?= $form->field($model, 'password')->passwordInput() ?>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <?= $form->field($model, 'verify_password')->passwordInput() ?>

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
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <?= $form->field($model, 'verify_email')->textInput(['maxlength' => true]) ?>

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
            <?= $form->field($model, 'birthday')->widget(\kartik\date\DatePicker::className(), [
                    'type' => \kartik\date\DatePicker::TYPE_INPUT,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ],
                    'options' => ['autocomplete' => 'off'],]

            ); ?>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <?= $form->field($model, 'address_line1')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">

            <?= $form->field($model, 'postal')->textInput() ?>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <?= $form->field($model, 'person_type')->dropDownList([0 => 'Individual', 1 => 'Company']); ?>

        </div>
        <!-- <div class="col-lg-4 col-md-6 col-sm-12">
            <? /*= $form->field($model, 'state')->textInput(['maxlength' => true]) */ ?>

        </div>-->

        <div class="col-lg-12">
        <?= $form->field($model, 'add_contacts')->textarea(['rows' => 4]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'captcha')->widget(\yii\captcha\Captcha::classname(),
                ['options' =>
                    ['autocomplete' => 'off', 'class' => 'form-control'],
                ]
            // configure additional widget properties here
            ) ?>
        </div>
        <div class="col-lg-3 col-lg-offset-3">
        <div class="form-group">
            <?= $form->field($model, 'agree_with_agreement')->checkbox(); ?>

            <?php echo Html::a('User Agreement',['/web/pdf/UserAgreement_eng.pdf'],['target' => '_blank']); ?>
            <?= Html::submitButton('Sign Up', ['class' => 'btn']) ?>
        </div>
        </div>
    </div>


</div>


<?php ActiveForm::end(); ?>

</div>
