<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Notifications;

/**
 * NotificationsSearch represents the model behind the search form of `app\models\Notifications`.
 */
class NotificationsSearch extends Notifications
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'status'], 'integer'],
            [['read', 'view', 'title', 'link', 'created_at'], 'safe'],
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
        $query = Notifications::find();

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
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'read', $this->read])
            ->andFilterWhere(['like', 'view', $this->view])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'link', $this->link]);

        return $dataProvider;
    }
}
