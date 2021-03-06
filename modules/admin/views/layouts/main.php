<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php

    NavBar::begin([
        'brandLabel' => 'NEST admin',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-fixed-top',
        ],
    ]);

    $menuItems = [
        ['label' => 'Home', 'url' => ['/']],
    ];

    $menuItems[] = ['label' => 'Users', 'url' => '/admin/users/'];
    $menuItems[] = ['label' => 'Payments', 'url' => '/admin/payments/'];

    $menuItems[] = ['label' => 'Texts',
        'items' =>
            [
                ['label' => 'Faqs', 'url' => '/admin/faq/index/'],
                ['label' => 'Messages', 'url' => '/admin/messages/index/'],
                ['label' => 'Source-messages', 'url' => '/admin/source-messages/index/']
            ]

    ];

    $menuItems[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            'Logout (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link logout','style' => 'padding-top: 17px; color: #0f0f0f']
        )
        . Html::endForm()
        . '</li>';


    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);

    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        <?php \app\utils\D::printr(); ?>

    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
