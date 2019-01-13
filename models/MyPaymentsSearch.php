<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Payments;

/**
 * MyPaymentsSearch represents the model behind the search form of `app\models\Payments`.
 */
class MyPaymentsSearch extends Payments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'type', 'value', 'status', 'confirm_status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Payments::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions

        if ($this->type) $query->andWhere(['type' => $this->type]);
        if ($this->id) $query->andWhere(['id' => $this->id]);
        if ($this->status) $query->andWhere(['status' => $this->status]);
        if ($this->confirm_status) $query->andWhere(['confirm_status' => $this->confirm_status]);


        return $dataProvider;
    }
}
