<?php
/**
 * Created by PhpStorm.
 * User: anvik
 * Date: 16.01.2019
 * Time: 16:44
 */

namespace app\models\forms;

use app\models\User;
use app\utils\D;
use yii\base\Model;

class EnterSmsCodeForm extends Model
{
    public $code;
    public $user_id;

    public function rules()
    {
        return [['code', 'integer']];

    }

    public function check($user)
    {
        if (($user->status == User::WAIT_FOR_SMS) && ($user->sms == $this->code)) {
            \Yii::$app->session->setFlash("success", " USER VALIDATED SUCCESSFULLY");
            return true;
        } else return false;
    }

    public function attributeLabels()
    {
        return ['code' => 'Sms code'];
    }
}