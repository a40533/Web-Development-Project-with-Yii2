<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Borrowed;

/**
 * BorrowedSearch represents the model behind the search form of `app\models\Borrowed`.
 */
class BorrowedSearch extends Borrowed
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'book_id', 'user_id'], 'integer'],
            [['borrowed_date', 'borrowed_time', 'return_date'], 'safe'],
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
        $query = Borrowed::find();

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
            'book_id' => $this->book_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'borrowed_date', $this->borrowed_date])
            ->andFilterWhere(['like', 'borrowed_time', $this->borrowed_time])
            ->andFilterWhere(['like', 'return_date', $this->return_date]);

        return $dataProvider;
    }
}
