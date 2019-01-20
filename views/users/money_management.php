<?php

use yii\helpers\Html;

/* @var $model \app\models\User;
 *
 */
echo \yii\helpers\Html::tag('h3', 'Account Money Management');
echo "<br>";

?>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <?php
            $trs = [];

            $trs[] = Html::tag('tr', Html::tag('td', 'Deposit:')
                . Html::tag('td', $model->getDeposit()."$", ['class' => 'text-right'])
                . Html::tag('td', \yii\helpers\Html::a('Make Deposit', ['/users/deposit'], ['class' => 'btn btn-success']),['class' => 'col-lg-3']));
            $trs[] = Html::tag('tr', Html::tag('td', 'Withdrawal:')
                    . Html::tag('td', $model->getWithdrawal()."$",['class' => 'text-right'])
                . Html::tag('td', \yii\helpers\Html::a('Withdrawal', ['/users/withdrawal'], ['class' => 'btn btn-success'])));
            ;
          //  $trs[] = Html::tag('tr', Html::tag('td', 'Bonuses:') . Html::tag('td', $model->getBonuses()));
            $thead = <<<HTML
<thead>
    <tr>
      <th style="width: 30%"></th>
      <th style="width: 30%">Amount</th>
      <th style="width: 40%">Action</th>
    </tr>
  </thead>
HTML;

            echo Html::tag('table', $thead.implode("", $trs), ['class' => 'table table-bordered','id' => 'table-money-managment']);

            ?>
        </div>
    </div>


<?php

echo \yii\helpers\Html::tag('h3', 'Account Statement');
echo \yii\helpers\Html::tag('h5', 'Here will be Account Statement');




