<?php

namespace app\models;

use Yii;
use \app\models\base\Groups as BaseGroups;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "groups".
 */
class Groups extends BaseGroups
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
