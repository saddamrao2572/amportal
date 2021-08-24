<?php

use yii\db\Migration;

class m210824_135900_Company_access extends Migration
{
    /**
     * @var array controller all actions
     */
    public $permisions = [
        "index" => [
            "name" => "app_company_index",
            "description" => "app/company/index"
        ],
        "view" => [
            "name" => "app_company_view",
            "description" => "app/company/view"
        ],
        "create" => [
            "name" => "app_company_create",
            "description" => "app/company/create"
        ],
        "update" => [
            "name" => "app_company_update",
            "description" => "app/company/update"
        ],
        "delete" => [
            "name" => "app_company_delete",
            "description" => "app/company/delete"
        ]
    ];
    
    /**
     * @var array roles and maping to actions/permisions
     */
    public $roles = [
        "AppCompanyFull" => [
            "index",
            "view",
            "create",
            "update",
            "delete"
        ],
        "AppCompanyView" => [
            "index",
            "view"
        ],
        "AppCompanyEdit" => [
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
