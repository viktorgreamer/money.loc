<?php
/* @var $model \app\models\User;
 *
 */
echo \yii\helpers\Html::tag('h3', $model->getFullName());
echo "<br>Last Visit: ".Yii::$app->formatter->asDate($model->visited_at);
echo "<br>Reg. Date : ".Yii::$app->formatter->asDate($model->created_at);

echo "<br>Total Deposited : ".$model->getDeposit();
echo "<br>Current Value : ".$model->getCurrentValue();



