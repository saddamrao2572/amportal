<?php

use yii\db\Migration;

class m200213_045500_Tickets_access extends Migration
{
    /**
     * @var array controller all actions
     */
    public $permisions = [
        "index" => [
            "name" => "app_tickets_index",
            "description" => "app/tickets/index"
        ],
        "view" => [
            "name" => "app_tickets_view",
            "description" => "app/tickets/view"
        ],
        "create" => [
            "name" => "app_tickets_create",
            "description" => "app/tickets/create"
        ],
        "update" => [
            "name" => "app_tickets_update",
            "description" => "app/tickets/update"
        ],
        "delete" => [
            "name" => "app_tickets_delete",
            "description" => "app/tickets/delete"
        ]
    ];
    
    /**
     * @var array roles and maping to actions/permisions
     */
    public $roles = [
        "AppTicketsFull" => [
            "index",
            "view",
            "create",
            "update",
            "delete"
        ],
        "AppTicketsView" => [
            "index",
            "view"
        ],
        "AppTicketsEdit" => [
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
