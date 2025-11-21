<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view-users',
            'create-users',
            'edit-users',
            'delete-users',
            'view-roles',
            'create-roles',
            'edit-roles',
            'delete-roles',
            'view-products',
            'create-products',
            'edit-products',
            'delete-products',
            'view-orders',
            'create-orders',
            'edit-orders',
            'delete-orders',
            'view-profile',
            'edit-profile',
            'delete-profile',
            'view-wishlist',
            'create-wishlist',
            'delete-wishlist',
            'view-cart',
            'create-cart',
            'edit-cart',
            'delete-cart',
            'view-blog',
            'create-blog',
            'edit-blog',
            'delete-blog',
            'view-contact',
            'create-contact',
            'edit-contact',
            'delete-contact',
            'view-faqs',
            'create-faqs',
            'edit-faqs',
            'delete-faqs',
            'view-settings',
            'create-settings',
            'edit-settings',
            'delete-settings',
            'view-about',
            'create-about',
            'edit-about',
            'delete-about',
            'view-categories',
            'create-categories',
            'edit-categories',
            'delete-categories',
            'view-shop',
            'create-shop',
            'edit-shop',
            'delete-shop',
            'view-checkout',
            'create-checkout',
            'edit-checkout',
            'delete-checkout',
            'view-dashboard',
            'create-dashboard',
            'edit-dashboard',
            'delete-dashboard',
            'view-admin-dashboard',
            'create-admin-dashboard',
            'edit-admin-dashboard',
            'delete-admin-dashboard',
            'view-admin-orders',
            'create-admin-orders',
            'edit-admin-orders',
            'delete-admin-orders',
        ];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
