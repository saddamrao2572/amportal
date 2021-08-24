<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "GroupsController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class GroupsController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Groups';
}
