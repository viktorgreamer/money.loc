<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MyPaymentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Make Deposit', ['/users/deposit'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a('Make Widthdrawal', ['/users/withdrawal'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'rowOptions' => function (\app\models\Payments $model) {
            return ['class' => $model->colorTypes()[$model->type]];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //  'user_id',

            [
                'label' => 'Type',
                'format' => 'html',
                'value' => function (\app\models\Payments $model) {
                    return $model->getTypeText();
                }],
            'valueText',
            [
                'label' => 'Status',
                'format' => 'html',
                'value' => function (\app\models\Payments $model) {
                    return $model->getStatusText();
                }],
           //'typeText',

            // 'status',
            //'confirm_status',

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
