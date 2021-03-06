<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Groups;

/**
* GroupsSearch represents the model behind the search form about `app\models\Groups`.
*/
class GroupsSearch extends Groups
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'created_by', 'status'], 'integer'],
            [['title', 'created_at'], 'safe'],
];
}

/**
* @inheritdoc
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
$query = Groups::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere([
            'id' => $this->id,
            'created_by' => $this->created_by,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

return $dataProvider;
}
}