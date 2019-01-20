<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $user \app\models\User */
echo $user->getFullName();

if ($query = $user->getPayments()->limit(5)->orderBy(['created_at' => SORT_DESC])) {
    $dataProvider = new \yii\data\ActiveDataProvider();
    $dataProvider->query = $query;
}
echo \yii\grid\GridView::widget(
    [
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'typeText',
            'created_at:datetime',
            'statusText',
            'valueText']

    ]);
$inputDepositForm = new \app\models\forms\AddProfitForm();
$inputDepositForm->user_id  = $user->id;
?>
<div class="input_deposit_form">

    <?php $form = ActiveForm::begin(['id' => 'add-profit-form']); ?>

        <?= $form->field($inputDepositForm, 'value') ?>
        <?= $form->field($inputDepositForm, 'user_id')->hiddenInput()->label(false) ?>


    <?php ActiveForm::end(); ?>
    <div class="form-group">
        <?= Html::button('Submit', ['class' => 'btn btn-success add-profit']) ?>
    </div>

</div>
<script>
  /*  $(document).on('click', ".add-profit",function (e) {
        data =  $('#add-profit-form').serialize();
        console.log(data);
        /!*$.ajax({
        url: '/admin/users/load-details-ajax',
        data: {user_id: user_id},
        type: 'post',
        success: function (response) {
        $(document).find("#load-modal-content").html(response);
        },

        /!* error: function () {
        alert('error')
        }*!/
    });
*/
</script>

<?php
$js = <<<JS



JS;

$this->registerJs($js, yii\web\View::POS_READY);

