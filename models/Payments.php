<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payments".
 *
 * @property int $id
 * @property int $user_id
 * @property int $type
 * @property int $value
 * @property int $status
 * @property int $confirm_status
 * @property int $confirmed_at
 * @property int $created_at
 */
class Payments extends \yii\db\ActiveRecord
{
    const DEPOSIT_TYPE = 1;
    const WITHDRAWAL_TYPE = 2;
    const BONUS_TYPE = 3;

    const STATUS_IN_PROCESSING = 1;
    const STATUS_CONFIRMED = 2;
    const STATUS_DENIED = 3;


    public function mapStatuses()
    {
        return [
            self::STATUS_IN_PROCESSING => 'In Processing',
            self::STATUS_CONFIRMED => 'Confirmed',
            self::STATUS_DENIED => 'Denied',
        ];
    }

    public function getStatusText()
    {
        return $this->mapStatuses()[$this->status];
    }


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payments';
    }

    public function colorTypes()
    {
        return [
            self::DEPOSIT_TYPE => 'success',
            self::WITHDRAWAL_TYPE => 'danger',
            self::BONUS_TYPE => 'success',
        ];
    }

    public function mapTypeText()
    {
        return [
            self::DEPOSIT_TYPE => 'Deposit',
            self::WITHDRAWAL_TYPE => 'Withdrawal',
            self::BONUS_TYPE => 'Bonus',
        ];
    }


    public function getTypeText()
    {
        return $this->mapTypeText()[$this->type];
    }


    public function getValueText()
    {
        if (in_array($this->type, [1, 3])) return "+" . $this->value;
        else return "-" . $this->value;

    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'type', 'value'], 'required'],
            [['user_id', 'type', 'value', 'status', 'confirm_status', 'confirmed_at', 'created_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app','ID'),
            'user_id' => Yii::t('app','User ID'),
            'Type' => Yii::t('app','Type'),
            'value' => Yii::t('app','Value'),
            'valueText' => Yii::t('app','Value'),
            'status' => Yii::t('app','Status'),
            'confirm_status' => Yii::t('app','Confirm Status'),
            'confirmed_at' => Yii::t('app','Confirmed_at'),
            'created_at' => Yii::t('app','Created_at'),
        ];
    }
}
