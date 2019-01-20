<?php

namespace app\models;

use app\utils\D;
use app\utils\P;
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
    const STATUS_ONDELETE = 2;
    const WAIT_FOR_SMS = 3;
    const STATUS_ACTIVE = 10;

    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;
    const SUPER_ADMIN = 3;

    const COUNT_VERIFY_SMS_ATTEMPTS = 3;

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */

    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            D::alert(" PASSWORDS REST TOKEN IN BOT VALID");
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }


    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {

            D::alert(" TOKEN IS EMPTY");
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];

        D::dump(['expiretime' => $timestamp + $expire, 'now' => time()]);
        if (!($timestamp + $expire >= time())) D::alert(" TOKEN IS EXPIRE");
        return $timestamp + $expire >= time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }


    /**
     * {@inheritdoc}
     */
    public function getCountry()
    {
        return $this->hasOne(Contries::className(), ['id' => 'country_id']);

    }

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
        return array_filter([
            'en' => "EN",
            'es' => 'ES'
        ], function ($index) {
            return in_array($index, Yii::$app->params['languages']);
        }, ARRAY_FILTER_USE_KEY);
    }

    public function sendMail($text = '')
    {
        return Yii::$app->mailer->compose()
            ->setFrom('info@mirs.pro')
            ->setTo($this->email)
            ->setSubject('From NEST')
            ->setTextBody($text)
            // ->setHtmlBody('<b>HTML content</b>')
            ->send();
    }

    public function sendSms($message = 'sms')
    {
        $smsru = new Sms(Yii::$app->params['APISMS']); // Ваш уникальный программный ключ, который можно получить на главной странице

        $data = new \stdClass();
        $data->to = preg_replace("/-|\(|\)/", "", $this->phone);
        $data->text = $message; // Текст сообщения
// $data->from = ''; // Если у вас уже одобрен буквенный отправитель, его можно указать здесь, в противном случае будет использоваться ваш отправитель по умолчанию
// $data->time = time() + 7*60*60; // Отложить отправку на 7 часов
// $data->translit = 1; // Перевести все русские символы в латиницу (позволяет сэкономить на длине СМС)
     //   $data->test = 1; // Позволяет выполнить запрос в тестовом режиме без реальной отправки сообщения
// $data->partner_id = '1'; // Можно указать ваш ID партнера, если вы интегрируете код в чужую систему
        $sms = $smsru->send_one($data); // Отправка сообщения и возврат данных в переменную

        if ($sms->status == "OK") { // Запрос выполнен успешно
            Yii::$app->session->setFlash('success','Wait for sms ');
           return true;

        } else {
            Yii::$app->session->setFlash('danger','Error sending the Sms');
          return false;
        }

    }

    public function buildSmsHttpRequest()
    {

        $sms = urlencode($this->buildSms($this->generateCode()));
        return "https://sms.ru/sms/send?api_id=" . Yii::$app->params['APISMS'] . "&to=" . $this->phone . "&msg=" . $sms . "&json=1";
    }

    public function generateCode()
    {

        return $this->sms = rand(100000, 999999);
    }

    public function buildSms($code)
    {
        return "Your code: " . $code;
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'address_line1', 'city', 'postal', 'country_id', 'lg', 'phone', 'birthday', 'email', 'username', 'auth_key', 'password_hash', 'status', 'created_at'], 'required'],
            [['postal', 'role', 'country_id', 'status', 'created_at', 'updated_at', 'visited_at', 'billing'], 'integer'],
            [['birthday'], 'safe'],
            [['first_name', 'last_name', 'company_name', 'lg', 'address_line1', 'address_line2', 'city', 'state', 'email', 'username', 'add_contacts'], 'string', 'max' => 256],
            [['phone'], 'string', 'max' => 15],
            [['sms'], 'integer', 'max' => 999999],
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
        if ($deposit = $this->getPayments()->andWhere(['type' => Payments::DEPOSIT_TYPE])->andWhere(['status' => Payments::STATUS_CONFIRMED])->sum('value')) {
            return $deposit;

        }  else return 0;
    }

    public function getWithdrawal()
    {
        if ($deposit = $this->getPayments()->andWhere(['type' => Payments::WITHDRAWAL_TYPE])->andWhere(['status' => Payments::STATUS_CONFIRMED])->sum('value')) {
            return $deposit;

        }  else return 0;
    }

    public function getBonuses()
    {
        return $this->getPayments()->andWhere(['type' => Payments::BONUS_TYPE])->andWhere(['status' => Payments::STATUS_CONFIRMED])->sum('value');

    }

    public function getCurrentValue()
    {
        return $this->billing;
    }

    public function beforeDelete()
    {

        Payments::deleteAll(['user_id' => $this->id]);
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'company_name' => Yii::t('app', 'Company Name'),
            'address_line1' => Yii::t('app', 'Address Line1'),
            'address_line2' => Yii::t('app', 'Address Line2'),
            'City' => Yii::t('app', 'City'),
            'State' => Yii::t('app', 'State'),
            'postal' => Yii::t('app', 'Postal'),
            'country_id' => Yii::t('app', 'Country'),
            'lg' => Yii::t('app', 'Language'),
            'phone' => Yii::t('app', 'Phone'),
            'birthday' => Yii::t('app', 'Birthday'),
            'email' => Yii::t('app', 'Email'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'status' => Yii::t('app', 'Status'),
            'add_contacts' => Yii::t('app', 'Add Contacts'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'agree_with_agreement' => Yii::t('app', 'I Agree with agreement'),
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
