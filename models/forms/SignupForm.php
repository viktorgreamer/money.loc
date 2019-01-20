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
    public $verify_password;
    public $verify_email;
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
    public $person_type;

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
            [['password','verify_password','verify_email'], 'required'],
            ['password', 'string', 'min' => 6],
            [['first_name', 'last_name', 'address_line1', 'city', 'postal','lg', 'country_id', 'phone', 'birthday', 'email', 'username','agree_with_agreement'], 'required'],
            [['postal', 'country_id', 'status', 'created_at', 'updated_at', 'agree_with_agreement'], 'integer'],
            [['birthday','lg','captcha','person_type'], 'safe'],
            ['verify_email', 'compare', 'compareAttribute'=>'email', 'message'=>Yii::t('app', 'Emails don\'t match')],
            ['verify_password', 'compare', 'compareAttribute'=>'password', 'message'=>Yii::t('app', 'Passwords don\'t match')],
            [['first_name', 'last_name', 'company_name', 'address_line1', 'address_line2', 'city', 'email', 'auth_key', 'password_hash', 'password_reset_token', 'add_contacts'], 'string', 'max' => 256],
            [['phone'], 'string', 'max' => 25],
            [['person_type'], 'integer'],
            // ['captcha', 'captcha'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'company_name' => Yii::t('app', 'Company Name (Optional)'),
            'address_line1' => Yii::t('app', 'Address Line'),
            'address_line2' => Yii::t('app', 'Address Line2'),
            'City' => Yii::t('app', 'City'),
            'State' => Yii::t('app', 'State'),
            'postal' => Yii::t('app', 'Postal/Zip code'),
            'country_id' => Yii::t('app', 'Country'),
            'lg' => Yii::t('app', 'Language'),
            'phone' => Yii::t('app', 'Phone'),
            'birthday' => Yii::t('app', 'Birthday'),
            'email' => Yii::t('app', 'Email'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'verify_password' => Yii::t('app', 'Verify Password '),
            'verify_email' => Yii::t('app', 'Verify Email '),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'status' => Yii::t('app', 'Status'),
            'add_contacts' => Yii::t('app', 'Additional Contacts (skype,facebook, etc.) '),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'agree_with_agreement' => Yii::t('app', 'I Agree with User Agreement'),
            'captcha' =>  Yii::t('app', 'Verification Code'),
            'person_type' =>  Yii::t('app', 'Account')
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {

        if ((!$this->validate())){
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
        $user->status = User::WAIT_FOR_SMS;
        $user->created_at = time();
        $user->updated_at = time();
        $user->visited_at = time();
        $user->person_type = $this->person_type;
        $user->role = User::ROLE_USER;


        if (!$user->validate()) D::dump($user->errors);

        return $user->save() ? $user : null;
    }

}