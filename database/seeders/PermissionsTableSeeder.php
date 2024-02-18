<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $tags = collect([
            'view dashboard',
            'create post',
            'store post',
            'edit post',
            'update post',
            'delete post',
            'view assign',
            'create assign',
            'edit assign',
            'update assign',
            'view assignUser',
            'create assignUser',
            'edit assignUser',
            'update assignUser',
            'view role',
            'create role',
            'edit role',
            'update role',
            'delete role',
            'view permission',
            'create permission',
            'edit permission',
            'update permission',
            'delete permission',
            'view subscribe',
            'edit subscribe',
            'update subscribe',
            'delete subscribe',
            'create tag',
            'store tag',
            'edit tag',
            'update tag',
            'delete tag',
            'view user',
            'email subscribe',
            'email all subscribers'
        ]);

        $tags->each(function ($c) {
            // Check if the permission already exists
            if (!Permission::where('name', $c)->exists()) {
                Permission::create([
                    'name' => $c,
                    'guard_name' => 'web',
                ]);
            }
        });
    }
}
