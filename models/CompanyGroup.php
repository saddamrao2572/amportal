<?php

namespace app\models;

use Yii;
use \app\models\base\CompanyGroup as BaseCompanyGroup;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "company_group".
 */
class CompanyGroup extends BaseCompanyGroup
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
