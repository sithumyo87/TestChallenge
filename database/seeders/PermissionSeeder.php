<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    function __construct(){

        $this->permission = ['permission-index', 'permission-create','permission-edit','permission-delete','permission-show'];

        $this->role = ['role-index', 'role-create','role-edit','role-delete','role-show'];

        $this->user = ['user-index', 'user-create','user-edit','user-delete','user-show'];
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create permission
        $this->permission_create($this->permission);
        $this->permission_create($this->role);
        $this->permission_create($this->user);

        // create role and give permission to this role
        $this->role_create('system', [Permission::all()]);
        $this->role_create('admin', [Permission::all()]);
        $this->role_create('moderator', [Permission::all()]);
    }

    public function permission_create($permissions){
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }

    public function role_create($role_name, $permissions){
        $role =  Role::create(['name' => $role_name]);
        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission);
        }
    }
}
