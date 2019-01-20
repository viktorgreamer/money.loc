<?php

namespace app\models\forms;

use app\models\User;
use Yii;
use yii\base\Model;
use app\utils\D;

/**
 * Signup form
 */
class AddProfitForm extends Model
{

    public $value;
    public $user_id;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value','user_id'], 'required'],
            ['value', 'number','min' => 1],
        ];
    }

    public function attributeLabels()
    {
        return [
            'value' => Yii::t('app','Add profit'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */

}