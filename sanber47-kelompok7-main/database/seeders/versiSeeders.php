<?php

namespace Database\Seeders;

use App\Models\Version;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class versiSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Version::create([
            'name' => 'Laravel 10.x',
        ]);
        Version::create([
            'name' => 'Laravel 9.x',
        ]);
        Version::create([
            'name' => 'Laravel 8.x',
        ]);
        Version::create([
            'name' => 'Laravel 7.x',
        ]);
        Version::create([
            'name' => 'Laravel 6.x',
        ]);
    }
}
