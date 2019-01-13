<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Faqs;

/**
 * FaqsSearch represents the model behind the search form of `app\modules\admin\models\Faqs`.
 */
class FaqsSearch extends Faqs
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'lg'], 'integer'],
            [['question', 'answer'], 'safe'],
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
        $query = Faqs::find();

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
        $query->andFilterWhere([
            'id' => $this->id,
            'lg' => $this->lg,
        ]);

        $query->andFilterWhere(['like', 'question', $this->question])
            ->andFilterWhere(['like', 'answer', $this->answer]);

        return $dataProvider;
    }
}
