<?php

use Illuminate\Database\Seeder;
use App\Admin\Module;

class default_list_modules extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('modules')->truncate();

        Module::create([
            'id' => 1,
            'name' => 'Management Static page',
            'route_key' => 'staticpage',
        ]);

        Module::create([
            'id' => 2,
            'name' => 'Management Services',
            'route_key' => 'service',
        ]);

        Module::create([
            'id' => 3,
            'name' => 'Management Timeline',
            'route_key' => 'timeline',
        ]);

        Module::create([
            'id' => 4,
            'name' => 'Management Team',
            'route_key' => 'team',
        ]);

        Module::create([
            'id' => 5,
            'name' => 'Management Member',
            'route_key' => 'member',
        ]);

        Module::create([
            'id' => 6,
            'name' => 'Management Contact',
            'route_key' => 'contact',
        ]);

        Module::create([
            'id' => 7,
            'name' => 'Management Group user',
            'route_key' => 'groupuser',
        ]);

        Module::create([
            'id' => 8,
            'name' => 'Management User',
            'route_key' => 'user',
        ]);

        Module::create([
            'id' => 9,
            'name' => 'Management Language',
            'route_key' => 'languages',
        ]);

        Module::create([
            'id' => 10,
            'name' => 'Configuration',
            'route_key' => 'config',
        ]);
    }
}
