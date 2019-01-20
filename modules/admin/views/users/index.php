<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\AdminUsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="user-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'fullName',
                'created_at:date',
                'deposit',
                'billing',
                'country.name',
                'phone',
                'email',
                [
                    'label' => 'statement',
                    'format' => 'raw',
                    'value' => function (\app\models\User $user) {
                        return Html::a('statement', false, [
                            'class' => 'btn btn-sm btn-success show-statistics',
                          //  'data' => ['toggle' => 'modal', 'target' => '#statistics-modal']
                           'data' => ['user_id' => $user->id]
                        ]);
                    }],
                //  ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="statistics-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">User Statictics</h4>
                </div>
                <div id="load-modal-content" class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php

$js = <<<JS
$(document).on('click', ".show-statistics",function (e) {
var user_id = $(this).data('user_id');
$('#statistics-modal').modal();
$.ajax({
url: '/admin/users/load-details-ajax',
data: {user_id: user_id},
type: 'post',
success: function (response) {
$(document).find("#load-modal-content").html(response);
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

    $(document).on('click', ".add-profit",function (e) {
   data =  $('#add-profit-form').serialize();
console.log(data);
$.ajax({
url: '/admin/payments/add-profit',
data: data,
type: 'post',
success: function (response) {

},

/* error: function () {
alert('errorss')
}*/
});
});

JS;

$this->registerJs($js, yii\web\View::POS_READY);

