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
<?php
/*style="height: 100%; margin: 0; height: 100%;
padding: 0;
margin: 0;
display: -webkit-box;
display: -moz-box;
display: -ms-flexbox;
display: -webkit-flex;
display: flex;
align-items: center;
justify-content: center;">*/
?>

<div class="wrap">
    <?php

    NavBar::begin([
        'brandLabel' => '<img src="/web/logo3.png" height="50px" class="pull-left"/>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-fixed-top',
        ],
    ]);

    $menuItems = [
        ['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']],
        //  ['label' => Yii::t('app', 'About'), 'url' => ['/site/about']],
        //    "<li><a><span class='change-lg' data-lg='en'>EN</span> | <span class='change-lg' data-lg='es'>ES</span> </a></li>",
    ];
    $menuItems[] =
        ['label' => Yii::t('app', 'WhitePaper'),
            'url' => ['/web/pdf/WhitePaper.pdf'],
            'linkOptions' => ['target' => '_blank']];
    $menuItems[] =
        ['label' => Yii::t('app', 'FAQ'), 'url' => ['/faq']]
        //  ['label' => Yii::t('app', 'About'), 'url' => ['/site/about']],
        //    "<li><a><span class='change-lg' data-lg='en'>EN</span> | <span class='change-lg' data-lg='es'>ES</span> </a></li>",
    ;

    if (Yii::$app->user->identity->role > \app\models\User::ROLE_USER) {
        $menuItems[] = ['label' => Yii::t('app', 'Admin'), 'url' => ['/admin']];
    }

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => Yii::t('app', 'Sign Up'), 'url' => ['/signup']];
        $menuItems[] = ['label' => Yii::t('app', 'Login'), 'url' => ['/login']];
    } else {
        $menuItems[] = ['label' => Yii::t('app', 'User'),
            'items' => [
                ['label' => Yii::t('app', 'Home'), 'url' => '/'],
                ['label' => Yii::t('app', 'Money Management'), 'url' => '/users/money-managment/'],
                ['label' => Yii::t('app', 'Payments'), 'url' => '/payments/index/'],
                ['label' => Yii::t('app', 'Statement'), 'url' => '/users/statement/'],
                ['label' => Yii::t('app', 'Settings'), 'url' => '/users/view/'],]

        ];

        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout','style' => 'padding-top: 17px; color: #0f0f0f']
            )
            . Html::endForm()
            . '</li>';
    }

    if (count(Yii::$app->params['languages']) > 1) {
        $menuItems[] = ['label' => mb_strtolower(preg_replace('/-.+/', '', Yii::$app->language)),
            'items' => [
                ['label' => 'en', 'url' => false,'options' => ['class' => 'change-lang','data' => ['lg' => 'en-EN']]],
                ['label' => 'es', 'url' => false, 'options' => ['class' => 'change-lang','data' => ['lg' => 'es-ES']]]
            ]];
    }



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
        <?php echo  \app\utils\D::printr(); ?>

    </div>
</div>

<footer class="footer navbar-fixed-bottom">
    <div class="container">
        <p class="pull-left">&copy; Nest Securities <?= date('Y') ?>  &nbsp;&nbsp;&nbsp;  </p>
        <p class="pull-left"><?php echo Html::a('User Agreement',['/web/pdf/UserAgreement_eng.pdf'],['target' => '_blank']); ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
    (function(){ var widget_id = 'nESO0Cfy6P';var d=document;var w=window;function l(){var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
</script>
<!-- {/literal} END JIVOSITE CODE -->
</body>
</html>
<?php $this->endPage() ?>
