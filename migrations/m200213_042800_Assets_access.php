<?php

use yii\db\Migration;

class m200213_042800_Assets_access extends Migration
{
    /**
     * @var array controller all actions
     */
    public $permisions = [
        "index" => [
            "name" => "app_assets_index",
            "description" => "app/assets/index"
        ],
        "view" => [
            "name" => "app_assets_view",
            "description" => "app/assets/view"
        ],
        "create" => [
            "name" => "app_assets_create",
            "description" => "app/assets/create"
        ],
        "update" => [
            "name" => "app_assets_update",
            "description" => "app/assets/update"
        ],
        "delete" => [
            "name" => "app_assets_delete",
            "description" => "app/assets/delete"
        ]
    ];
    
    /**
     * @var array roles and maping to actions/permisions
     */
    public $roles = [
        "AppAssetsFull" => [
            "index",
            "view",
            "create",
            "update",
            "delete"
        ],
        "AppAssetsView" => [
            "index",
            "view"
        ],
        "AppAssetsEdit" => [
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
