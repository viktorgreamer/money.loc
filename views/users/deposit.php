<?php
/* @var $model \app\models\User; */

/* @var $this  \yii\web\View */

use yii\helpers\Html;

$faker = \Faker\Factory::create();


echo Html::tag('h3', Yii::t('app', 'Welcome, {fullName}', ['fullName' => $model->getFullName()]));
echo "<br>";
echo \yii\helpers\Html::tag('h4', 'Text instructions for deposit');

echo \yii\helpers\Html::tag('p', $faker->text(500));


?>
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
            <?php
            $trs = [];


            $trs[] = Html::tag('tr', Html::tag('td', 'Last Visit:') . Html::tag('td', Yii::$app->formatter->asDate($model->visited_at)));
            $trs[] = Html::tag('tr', Html::tag('td', 'Reg. Date:') . Html::tag('td', Yii::$app->formatter->asDate($model->created_at)));
            echo Html::tag('table', implode("", $trs), ['class' => 'table table-bordered']);

            $trs = [];
            $trs[] = Html::tag('tr', Html::tag('td', 'Total Deposited:') . Html::tag('td', $model->getDeposit()));
            $trs[] = Html::tag('tr', Html::tag('td', 'Current Value:') . Html::tag('td', $model->billing));
            echo Html::tag('table', implode("", $trs), ['class' => 'table table-bordered']);


            ?>
        </div>
    </div>
<?php


echo $this->render('input_deposit_form', ['inputDepositForm' => $inputDepositForm]);




