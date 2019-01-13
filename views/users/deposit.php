<?php
/* @var $model \app\models\User; */
/* @var $this  \yii\web\View */

$faker = \Faker\Factory::create();

echo \yii\helpers\Html::tag('h3', 'Text instructions for deposit');

echo \yii\helpers\Html::tag('p', $faker->text(500));

echo "<br>Total Deposited : ".$model->getDeposit();
echo "<br>Current Value : ".$model->billing;




echo $this->render('input_deposit_form',['inputDepositForm' => $inputDepositForm]);




