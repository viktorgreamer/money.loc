<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Подтверждение Смс';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="verify-sms">
    <h1><?= Html::encode($this->title) ?></h1>

    <p class="seconnds">Enter code from sms in 5 minutes</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'code')->textInput(['autofocus' => true]) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
            <?= Html::submitButton('Repeat', ['class' => 'btn btn-success repeat-sms', 'disabled' => true]) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>
    <?php
    $js = <<<JS
    window.seconds_interval_start = 10;
    window.seconds_lost = 10;
 console.log(window.seconds_lost);
 
 setInterval(myMethod, 1000);

function myMethod( )
{
   window.seconds_lost = window.seconds_lost - 1;
     if (window.seconds_lost = 0) {
            $(document).find(".repeat-sms").attr('disabled',false);
        }
            $(document).find("p.seconds").text(' Enter code from sms in ' +window.seconds_lost + 'seconds.');
        
   console.log(window.seconds_lost);
}

      
      

    

      


$(document).on('click', '.repeat-sms',function (e) {
    user_id = $(this).data('user_id');

    $.ajax({
        url: '/users/repeat-sms',
        data: {user_id: user_id},
        type: 'post',
        success: function (response) {
            window.second = window.second_interval;
            $(document).find(".seconds").text(' Enter code from sms in ' + second+ 'seconds');
            $(document).find(".repeat-sms").attr('disabled',true);
            timerDecrement();

        },

        /* error: function () {
             alert('error')
         }*/
    });
});



JS;
    Yii::$app->view->registerJs($js, \yii\web\View::POS_READY);


    ?>

</div>
