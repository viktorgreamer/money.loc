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
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'company_name' => 'Company Name',
            'address_line1' => 'Address Line1',
            'address_line2' => 'Address Line2',
            'City' => 'City',
            'State' => 'State',
            'postal' => 'Postal',
            'country_id' => 'Country ID',
            'lg' => 'Lg',
            'phone' => 'Phone',
            'birthday' => 'Birthday',
            'email' => 'Email',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'status' => 'Status',
            'add_contacts' => 'Add Contacts',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'agree_with_agreement' => 'I Agree with User Agreement',
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