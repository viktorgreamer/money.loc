<?php

use yii\helpers\Html;

/* @var $model \app\modules\admin\models\Faqs */

echo \yii\helpers\Html::tag('h3', $model->question);
echo Html::tag('p', $model->answer);

