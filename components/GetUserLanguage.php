<?php
/**
 * Created by PhpStorm.
 * User: anvik
 * Date: 15.01.2019
 * Time: 21:14
 */

namespace app\components;

use app\models\User;
use app\utils\D;
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
        User::deleteAll(['AND', ['status' => User::WAIT_FOR_SMS], ['<', 'created_at', time() - 60 * 10]]);
        if (\Yii::$app->user->isGuest) {
            if (\Yii::$app->request->cookies->get('language')) {

                \Yii::$app->language = \Yii::$app->request->cookies->get('language');
             //   D::alert(" LG SET BY COOKIE");
            } else {
              //  D::alert(" LG SET BY DEFAULT");
                \Yii::$app->language = 'en';
            }

        } else {
         //   D::alert(" LG SET BY USER SETTINGS");
            \Yii::$app->language = \Yii::$app->user->identity->lg;
        }
    }
}