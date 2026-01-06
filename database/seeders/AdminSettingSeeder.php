<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            'title' => 'Admin panel',
            'logo' => 'null',
            'description' => 'Admin panel',
            'keywords' => 'admin, admin panel',
            'author' => 'Islombek Baxromov',
            'brand_name' => "Site Name",
        ]);
    }
}
