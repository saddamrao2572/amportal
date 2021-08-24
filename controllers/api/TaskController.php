<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "TaskController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class TaskController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Task';
}
