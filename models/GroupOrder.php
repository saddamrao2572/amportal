<?php

namespace app\models;

use Yii;
use \app\models\base\GroupOrder as BaseGroupOrder;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "group_order".
 */
class GroupOrder extends BaseGroupOrder
{

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                # custom validation rules
            ]
        );
    }
}
