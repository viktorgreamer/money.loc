<?php

namespace app\models\forms;

use app\models\User;
use Yii;
use yii\base\Model;
use app\utils\D;

/**
 * Signup form
 */
class InputDepositForm extends Model
{

    public $value;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['value', 'required'],
            ['value', 'integer','min' => 1],
        ];
    }

    public function attributeLabels()
    {
        return [
            'value' => Yii::t('app','Value'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */

}