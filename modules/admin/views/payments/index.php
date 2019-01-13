<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\PaymentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payments';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="payments-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        <?php \yii\widgets\Pjax::begin(['id' => 'pjax']); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'emptyCell' => '',
            'rowOptions' => function (\app\models\Payments $model) {
                return ['class' => $model->colorTypes()[$model->type]];
            },
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                'user.fullName',
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
                'created_at:datetime',
                'confirmed_at:datetime',
                //'confirm_status',

                ['class' => 'yii\grid\ActionColumn',
                    'template' => '{view}{update}{delete}{confirm}{deny}{in_processing}',
                    'buttons' => [
                        'confirm' => function ($url, $model) {
                            return Html::a('Confirm ', false, [
                                'title' => 'Confirm',
                                'class' => 'btn btn-success confirm-payment',
                                'data' => ['payment_id' => $model->id]]);
                        },
                        'deny' => function ($url, $model) {
                            return Html::a('Deny', false,
                                [
                                    'title' => 'Deny',
                                    'class' => 'btn btn-danger deny-payment',
                                    'data' => ['payment_id' => $model->id]]);
                        }, 'in_processing' => function ($url, $model) {
                            return Html::a('In Process', false,
                                [
                                    'title' => 'Deny',
                                    'class' => 'btn btn-primary in_processing-payment',
                                    'data' => ['payment_id' => $model->id]]);
                        },
                    ]],
            ],
        ]); ?>
    </div>
<?php
\yii\widgets\Pjax::end();

$js = <<<JS

$(document).on('click', ".confirm-payment",function (e) {
 var payment_id = $(this).data('payment_id');    
 
 $.ajax({
        url: '/admin/payments/confirm',
        data: {payment_id: payment_id},
        type: 'post',
        success: function (response) {
        response = JSON.parse(response);
           status = response.status;
           if (status == 0) alert(response.message);
           $.pjax.reload({container:'#pjax'});
        },

        /* error: function () {
             alert('error')
         }*/
    });
});

$(document).on('click', '.deny-payment',function (e) {
 var payment_id = $(this).data('payment_id');    
 
 $.ajax({
        url: '/admin/payments/deny',
        data: {payment_id: payment_id},
        type: 'post',
        success: function (response) {
           console.log(response);
        },

        /* error: function () {
             alert('error')
         }*/
    });
});
$(document).on('click', ".in_processing-payment", function (e) {
 var payment_id = $(this).data('payment_id');    
 
 $.ajax({
        url: '/admin/payments/in-processing',
        data: {payment_id: payment_id},
        type: 'post',
        success: function (response) {
           console.log(response);
        },

        /* error: function () {
             alert('error')
         }*/
    });
});

JS;

$this->registerJs($js, yii\web\View::POS_READY);

