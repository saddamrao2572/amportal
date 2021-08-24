<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[City]].
 *
 * @see City
 */
class CityQuery extends \yii\db\ActiveQuery
{
    public function byState($state)
    {
        return $this->where(['state_id'=>$state])->all();
    }
	
	public function byStateName($state, $name)
    {
        return $this->where(['state_id'=>$state,'name'=>$name])->one();
    }

    /**
     * @inheritdoc
     * @return City[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return City|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
