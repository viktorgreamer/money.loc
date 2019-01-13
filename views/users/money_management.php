<?php
/* @var $model \app\models\User;
 *
 */
echo \yii\helpers\Html::tag('h3','Account Money Management');

echo "<br>Deposit : ".$model->getDeposit().\yii\helpers\Html::a('Account Deposit',['/users/deposit'],['class' => 'btn btn-success']);
echo "<br>Withdrawal : ".$model->getWithdrawal().\yii\helpers\Html::a('Account Withdrawal',['/users/withdrawal'],['class' => 'btn btn-success']);

echo \yii\helpers\Html::tag('h3','Account Statement');




