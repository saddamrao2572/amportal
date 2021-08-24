<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GroupOrder;

/**
* GroupOrderSearch represents the model behind the search form about `app\models\GroupOrder`.
*/
class GroupOrderSearch extends GroupOrder
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'task_id', 'group_id', 'created_by', 'status'], 'integer'],
            [['created_at', 'unique_id'], 'safe'],
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
$query = GroupOrder::find();

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
            'task_id' => $this->task_id,
            'group_id' => $this->group_id,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'unique_id', $this->unique_id]);

return $dataProvider;
}
}