<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Roles
        $master = Role::create(['name' => 'master']);
        $service = Role::create(['name' => 'service']);
        $financial = Role::create(['name' => 'financial']);
        $marketing = Role::create(['name' => 'marketing']);
        $organizer = Role::create(['name' => 'organizer']);
        $influencer = Role::create(['name' => 'influencer']);
        $athlete = Role::create(['name' => 'athlete']);

        // Permissions
        $dashboard_page_permission = Permission::create(['name' => 'view dashboard']);
        $order_page_permission = Permission::create(['name' => 'view orders']);
        $customer_page_permission = Permission::create(['name' => 'view customers']);
        $finance_page_permission = Permission::create(['name' => 'view finances']);
        $user_page_permission = Permission::create(['name' => 'view users']);
        $event_page_permission = Permission::create(['name' => 'view events']);
        $coupon_page_permission = Permission::create(['name' => 'view coupons']);
        $courtesy_page_permission = Permission::create(['name' => 'view courtesy']);
        $marketing_schedule_page_permission = Permission::create(['name' => 'view marketing schedule']);
        $marketing_page_permission = Permission::create(['name' => 'view marketing']);
        $partnership_page_permission = Permission::create(['name' => 'view partnerships']);
        $graphic_material_page_permission = Permission::create(['name' => 'view graphic materials']);
        $drafts_page_permission = Permission::create(['name' => 'view drafts']);
        $my_orders_page_permission = Permission::create(['name' => 'view my orders']);
        $my_account_page_permission = Permission::create(['name' => 'view my account']);

        // Assign permissions to roles
        $master->givePermissionTo(Permission::all());

        $service->givePermissionTo([
            $dashboard_page_permission,
            $order_page_permission,
            $customer_page_permission,
            $marketing_schedule_page_permission,
        ]);

        $financial->givePermissionTo([
            $dashboard_page_permission,
            $order_page_permission,
            $customer_page_permission,
            $finance_page_permission,
            $user_page_permission,
        ]);

        $marketing->givePermissionTo([
            $dashboard_page_permission,
            $event_page_permission,
            $coupon_page_permission,
            $courtesy_page_permission,
            $marketing_page_permission,
            $user_page_permission,
        ]);
        
        $organizer->givePermissionTo([
            $dashboard_page_permission,
            $event_page_permission,
            $order_page_permission,
            $customer_page_permission,
            $coupon_page_permission,
            $courtesy_page_permission,
            $marketing_page_permission,
        ]);

        $influencer->givePermissionTo([
            $dashboard_page_permission,
            $finance_page_permission,
            $coupon_page_permission,
            $courtesy_page_permission,
            $partnership_page_permission,
            $graphic_material_page_permission,
        ]);

        $athlete->givePermissionTo([
            $drafts_page_permission,
            $my_orders_page_permission,
            $my_account_page_permission,
        ]);
    }
}
