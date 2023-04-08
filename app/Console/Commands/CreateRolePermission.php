<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateRolePermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-role-permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        DB::beginTransaction();
        $this->line('starting...');
        $this->line('inserting role and permissions');
        $this->createRolePermission();
        $this->line('assigning permissions to each roles');
        $this->assignRolePermission();
        $this->line('creating super admin account');
        $this->warn('super admin\'s password is "superadmin", please change it in database');
        $this->createSuperAdminUser();
        $this->line('super admin account created');
        $this->info('Insert and assign role permission is successful - Supported by Jaffran');
        DB::commit();
    }
    public function createSuperAdminUser()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'super admin',
            'email' => 'super@admin',
            'password' => Hash::make('superadmin'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        User::find(1)->assignRole('super-admin');
    }
    public function createRolePermission()
    {
        Role::insert([
            [
                'name' => 'member',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'provider',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'super-admin',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Permission::insert([
            //user
            [
                'name' => 'create-user',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'update-user',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'delete-user',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'view-user',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            //category
            [
                'name' => 'create-category',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'update-category',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'delete-category',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'view-category',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            //package
            [
                'name' => 'create-package',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'update-package',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'delete-package',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'view-package',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            //provider
            [
                'name' => 'create-provider',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'update-provider',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'delete-provider',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'view-provider',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            //member
            [
                'name' => 'create-member',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'update-member',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'delete-member',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'view-member',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            //due
            [
                'name' => 'create-due',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'update-due',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'delete-due',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'view-due',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            //transaction
            [
                'name' => 'create-transaction',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'update-transaction',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'delete-transaction',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'view-transaction',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            //payment-method
            [
                'name' => 'create-payment-method',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'update-payment-method',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'delete-payment-method',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'view-payment-method',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            //withdraw
            [
                'name' => 'create-withdraw',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'update-withdraw',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'delete-withdraw',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'view-withdraw',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
    public function assignRolePermission()
    {
        //set role permission
        Role::findByName('super-admin', 'web')->givePermissionTo(
            Permission::get('name')->pluck('name')->toArray() //assign all permission
        );

        //member
        Role::findByName('member', 'web')->givePermissionTo(
            //transaction
            'create-transaction',
            'view-transaction',
        );

        //provider
        Role::findByName('provider', 'web')->givePermissionTo(
            //transaction
            'create-transaction',
            'view-transaction',

            //package
            'create-package',
            'update-package',
            'delete-package',
            'view-package',

            //member
            'create-member',
            'update-member',
            'delete-member',
            'view-member',

            //due
            'view-due',

            //provider
            'update-provider',

            //withdraw
            'create-withdraw'
        );
    }
}
