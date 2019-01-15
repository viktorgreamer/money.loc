<?php
/**
 * Created by PhpStorm.
 * User: anvik
 * Date: 15.01.2019
 * Time: 21:14
 */

namespace app\components;

use yii\base\Behavior;
use yii\web\Application;

class GetUserLanguage extends Behavior
{
    public function events()
    {
        return [
            Application::EVENT_BEFORE_REQUEST => 'setDefaultLanguage'
        ];
    }

    public function setDefaultLanguage()
    {
         \Yii::$app->language = \Yii::$app->user->identity->lg;
    }
}