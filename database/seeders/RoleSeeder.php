<?php

namespace Database\Seeders;




use App\Enums\PermissionsEnum;
use App\Enums\RolesEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_role = Role::create(['name'=> RolesEnum::USER->value]);
        $admin_role = Role::create(['name'=> RolesEnum::ADMIN->value]);
        $vendor_role = Role::create(['name'=> RolesEnum::VENDOR->value]);

        $approve_vendors = Permission::create([
            'name'=> PermissionsEnum::APPROVE_VENDORS->value
        ]);
        $sell_products = Permission::create([
            'name'=> PermissionsEnum::SELL_PRODUCTS->value
        ]);
        $buy_products = Permission::create([
            'name'=> PermissionsEnum::BUY_PRODUCTS->value
        ]);

        $user_role->syncPermissions([$buy_products]);
        $vendor_role->syncPermissions([$sell_products, $buy_products]);
        $admin_role->syncPermissions([
            $approve_vendors,
            $sell_products,
            $buy_products
        ]);
    }
}
