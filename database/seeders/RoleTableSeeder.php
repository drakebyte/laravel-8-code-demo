<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Super administrator',
        ]);
        DB::table('roles')->insert([
            'name' => 'Site administrator',
        ]);
        DB::table('roles')->insert([
            'name' => 'Editor',
        ]);
        DB::table('roles')->insert([
            'name' => 'Subscriber',
        ]);
    }
}
