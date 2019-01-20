<?php
/* @var $model \app\models\User; */

/* @var $WithdrawalForm \app\models\forms\WithdrawalForm; */

use yii\helpers\Html;
echo  Html::tag('h3', Yii::t('app', 'Welcome, {fullName}', ['fullName' => $model->getFullName()]));

?>
<div class="row">
    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
        <?php
        $trs = [];


        $trs[] = Html::tag('tr', Html::tag('td', 'Last Visit:') . Html::tag('td', Yii::$app->formatter->asDate($model->visited_at)));
        $trs[] = Html::tag('tr', Html::tag('td', 'Reg. Date:') . Html::tag('td', Yii::$app->formatter->asDate($model->created_at)));
        echo Html::tag('table', implode("", $trs), ['class' => 'table table-bordered']);

        $trs = [];
        $trs[] = Html::tag('tr', Html::tag('td', 'Total Widthdrawal:') . Html::tag('td', $model->getWithdrawal()));
        $trs[] = Html::tag('tr', Html::tag('td', 'Current Value:') . Html::tag('td', $model->billing));
        echo Html::tag('table', implode("", $trs), ['class' => 'table table-bordered']);


        ?>
    </div>
</div>
<?php





echo $this->render('withdrawal_form',['WithdrawalForm' => $WithdrawalForm]);


