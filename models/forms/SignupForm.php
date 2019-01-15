<?php

namespace app\models\forms;

use app\models\User;
use Yii;
use yii\base\Model;
use app\utils\D;

/**
 * Signup form
 */
class SignupForm extends Model
{

    public $username;
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $company_name;
    public $address_line1;
    public $address_line2;
    public $city;
    public $state;
    public $postal;
    public $country_id;
    public $lg;
    public $phone;
    public $birthday;

    public $auth_key;
    public $password_hash;
    public $password_reset_token;
    public $status;
    public $add_contacts;
    public $created_at;
    public $updated_at;
    public $agree_with_agreement;
    public $captcha;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            [['first_name', 'last_name', 'address_line1', 'city', 'state', 'postal', 'country_id', 'lg', 'phone', 'birthday', 'email', 'username'], 'required'],
            [['postal', 'country_id', 'lg', 'status', 'created_at', 'updated_at', 'agree_with_agreement'], 'integer'],
            [['birthday'], 'safe'],
            [['first_name', 'last_name', 'company_name', 'address_line1', 'address_line2', 'city', 'state', 'email', 'auth_key', 'password_hash', 'password_reset_token', 'add_contacts'], 'string', 'max' => 256],
            [['phone'], 'string', 'max' => 15],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app','ID'),
            'first_name' => Yii::t('app','First Name'),
            'last_name' => Yii::t('app','Last Name'),
            'company_name' => Yii::t('app','Company Name'),
            'address_line1' => Yii::t('app','Address Line1'),
            'address_line2' => Yii::t('app','Address Line2'),
            'City' => Yii::t('app','City'),
            'State' => Yii::t('app','State'),
            'postal' => Yii::t('app','Postal'),
            'country_id' => Yii::t('app','Country ID'),
            'lg' => Yii::t('app','c'),
            'phone' => Yii::t('app','Phone'),
            'birthday' => Yii::t('app','Birthday'),
            'email' => Yii::t('app','Email'),
            'username' => Yii::t('app','Username'),
            'auth_key' => Yii::t('app','Auth Key'),
            'password_hash' => Yii::t('app','Password Hash'),
            'password_reset_token' => Yii::t('app','Password Reset Token'),
            'status' => Yii::t('app','Status'),
            'add_contacts' => Yii::t('app','Add Contacts'),
            'created_at' => Yii::t('app','Created At'),
            'updated_at' => Yii::t('app','Updated At'),
            'agree_with_agreement' => Yii::t('app','I Agree with agreement'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {

        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->company_name = $this->company_name;
        $user->address_line1 = $this->address_line1;
        $user->address_line2 = $this->address_line2;
        $user->city = $this->city;
        $user->state = $this->state;
        $user->postal = $this->postal;
        $user->country_id = $this->country_id;
        $user->lg = $this->lg;
        $user->phone = $this->phone;
        $user->birthday = $this->birthday;
        $user->add_contacts = $this->add_contacts;
        $user->status = 10;
        $user->created_at = time();
        $user->updated_at = time();
        $user->visited_at = time();
        $user->role = User::ROLE_USER;


        if (!$user->validate()) D::dump($user->errors);

        return $user->save() ? $user : null;
    }

}