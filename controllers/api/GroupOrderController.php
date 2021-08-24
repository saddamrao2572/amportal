<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "GroupOrderController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class GroupOrderController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\GroupOrder';
}
