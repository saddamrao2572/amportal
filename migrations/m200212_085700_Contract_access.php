<?php

use yii\db\Migration;

class m200212_085700_Contract_access extends Migration
{
    /**
     * @var array controller all actions
     */
    public $permisions = [
        "index" => [
            "name" => "app_contract_index",
            "description" => "app/contract/index"
        ],
        "view" => [
            "name" => "app_contract_view",
            "description" => "app/contract/view"
        ],
        "create" => [
            "name" => "app_contract_create",
            "description" => "app/contract/create"
        ],
        "update" => [
            "name" => "app_contract_update",
            "description" => "app/contract/update"
        ],
        "delete" => [
            "name" => "app_contract_delete",
            "description" => "app/contract/delete"
        ]
    ];
    
    /**
     * @var array roles and maping to actions/permisions
     */
    public $roles = [
        "AppContractFull" => [
            "index",
            "view",
            "create",
            "update",
            "delete"
        ],
        "AppContractView" => [
            "index",
            "view"
        ],
        "AppContractEdit" => [
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
