<?php

use yii\db\Migration;

class m200213_044700_Location_access extends Migration
{
    /**
     * @var array controller all actions
     */
    public $permisions = [
        "index" => [
            "name" => "app_location_index",
            "description" => "app/location/index"
        ],
        "view" => [
            "name" => "app_location_view",
            "description" => "app/location/view"
        ],
        "create" => [
            "name" => "app_location_create",
            "description" => "app/location/create"
        ],
        "update" => [
            "name" => "app_location_update",
            "description" => "app/location/update"
        ],
        "delete" => [
            "name" => "app_location_delete",
            "description" => "app/location/delete"
        ]
    ];
    
    /**
     * @var array roles and maping to actions/permisions
     */
    public $roles = [
        "AppLocationFull" => [
            "index",
            "view",
            "create",
            "update",
            "delete"
        ],
        "AppLocationView" => [
            "index",
            "view"
        ],
        "AppLocationEdit" => [
            "update",
            "create",
            "delete"
        ]
    ];
    
    public function up()
    {
        
        $permisions = [];
        $auth = \Yii::$app->authManager;

        /**
         * create permisions for each controller action
         */
        foreach ($this->permisions as $action => $permission) {
            $permisions[$action] = $auth->createPermission($permission['name']);
            $permisions[$action]->description = $permission['description'];
            $auth->add($permisions[$action]);
        }

        /**
         *  create roles
         */
        foreach ($this->roles as $roleName => $actions) {
            $role = $auth->createRole($roleName);
            $auth->add($role);

            /**
             *  to role assign permissions
             */
            foreach ($actions as $action) {
                $auth->addChild($role, $permisions[$action]);
            }
        }
    }

    public function down() {
        $auth = Yii::$app->authManager;

        foreach ($this->roles as $roleName => $actions) {
            $role = $auth->createRole($roleName);
            $auth->remove($role);
        }

        foreach ($this->permisions as $permission) {
            $authItem = $auth->createPermission($permission['name']);
            $auth->remove($authItem);
        }
    }
}
