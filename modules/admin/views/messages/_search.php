<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MessagesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-search">
    <div class="row">
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>

        <div class="col-lg-3">
            <?= $form->field($model, 'id')->dropDownList([null => ''] + \app\models\SourceMessage::map()) ?>

        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'language')->dropDownList(\app\models\SourceMessage::mapLanguages()) ?>

        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'translation') ?>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
