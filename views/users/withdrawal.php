<?php
/* @var $model \app\models\User; */
/* @var $WithdrawalForm \app\models\forms\WithdrawalForm; */

echo \yii\helpers\Html::tag('h3', $model->getFullName());
echo "<br>Last Visit: ".Yii::$app->formatter->asDate($model->visited_at);
echo "<br>Reg. Date : ".Yii::$app->formatter->asDate($model->created_at);

echo "<br>Total Widthdrawal : ".$model->getWithdrawal();
echo "<br>Current Value : ".$model->billing;



echo $this->render('withdrawal_form',['WithdrawalForm' => $WithdrawalForm]);


