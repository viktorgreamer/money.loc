<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property int $id
 * @property string $question
 * @property string $answer
 * @property int $lg
 */
class Faqs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faq';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question', 'answer', 'lg'], 'required'],
            [['question', 'answer','lg'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app','ID'),
            'question' => Yii::t('app','Question'),
            'answer' => Yii::t('app','Answer'),
            'lg' => Yii::t('app','Lg'),
        ];
    }
}
