<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->getFullName();
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //  'id',
            'first_name',
            'last_name',
            'company_name',
            'address_line1',
            'address_line2',
            'city',
            'state',
            'postal',
            'country.name',
            'lg',
            'phone',
            'birthday',
            'email:email',
            'username',
           // 'auth_key',
           // 'password_hash',
           // 'password_reset_token',
           // 'status',
            'add_contacts',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
