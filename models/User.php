<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $company_name
 * @property string $address_line1
 * @property string $address_line2
 * @property string $city
 * @property string $state
 * @property int $postal
 * @property int $country_id
 * @property int $billing
 * @property int $lg
 * @property string $phone
 * @property string $birthday
 * @property string $email
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property int $status
 * @property string $add_contacts
 * @property int $created_at
 * @property int $updated_at
 * @property int $visited_at
 * @property int $role
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_BLOCKED = 1;
    const STATUS_ACTIVE = 10;

    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;
    const SUPER_ADMIN = 3;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    public static function mapUsers()
    {
        return ArrayHelper::map(User::find()->all(), 'id', 'fullName');
    }

    public function mapStatuses()
    {
        return [
            self::STATUS_DELETED => 'DELETED',
            self::STATUS_BLOCKED => 'BLOCKED',
            self::STATUS_ACTIVE => 'ACTIVE',
        ];
    }

    public static function mapLang()
    {
        return [
            1 => "EN",
            2 => 'ES'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'address_line1', 'city', 'state', 'postal', 'country_id', 'lg', 'phone', 'birthday', 'email', 'username', 'auth_key', 'password_hash', 'status', 'created_at'], 'required'],
            [['postal','role', 'country_id', 'lg', 'status', 'created_at', 'updated_at', 'visited_at', 'billing'], 'integer'],
            [['birthday'], 'safe'],
            [['first_name', 'last_name', 'company_name', 'address_line1', 'address_line2', 'city', 'state', 'email', 'username', 'add_contacts'], 'string', 'max' => 256],
            [['phone'], 'string', 'max' => 15],
        ];
    }

    public function getFullName()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function getPayments()
    {
        return $this->hasOne(Payments::className(), ['user_id' => 'id']);
    }

    public function getDeposit()
    {
        return $this->getPayments()->andWhere(['type' => Payments::DEPOSIT_TYPE])->sum('value');
    }

    public function getWithdrawal()
    {
        return $this->getPayments()->andWhere(['type' => Payments::WITHDRAWAL_TYPE])->sum('value');
    }

    public function getCurrentValue()
    {
        return $this->billing;
    }

    /**
     * {@inheritdoc}
     */
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
            'visited_at' => 'Visited At',
            'billing' => 'Billing',
        ];
    }

    /**
     * @inheritdoc
     */

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

}
