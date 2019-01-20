<?php

use yii\helpers\Html;

/* @var $model \app\modules\admin\models\Faqs */

echo \yii\helpers\Html::tag('h3', $model->question,['style' => 'color: blue; !important',
    'data' => ['toggle' => 'collapse','target' => '#faq'.$model->id]]);
$formatted = implode("<br>",explode("\n", $model->answer));
echo Html::tag('p', $formatted,['style' => 'font-size: larger','id' => 'faq'.$model->id,'class' => 'collapse']);
?>

<hr>

