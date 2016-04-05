<?php

use Illuminate\Database\Seeder;
use App\Admin\TemplateBlock;

class database_template_block extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('template_blocks')->truncate();

        TemplateBlock::create([
            'id' => 1,
            'parent_id' => 0,
            'name' => 'Privacy Policy page',
        ]);

        TemplateBlock::create([
            'id' => 2,
            'parent_id' => 0,
            'name' => 'Offshore Development page',
        ]);

        TemplateBlock::create([
            'id' => 3,
            'parent_id' => 2,
            'name' => 'What is offshore development block',
        ]);

        TemplateBlock::create([
            'id' => 4,
            'parent_id' => 2,
            'name' => 'Laboratory block',
        ]);

        TemplateBlock::create([
            'id' => 5,
            'parent_id' => 2,
            'name' => 'Backage block',
        ]);

        TemplateBlock::create([
            'id' => 6,
            'parent_id' => 0,
            'name' => 'About page',
        ]);

        TemplateBlock::create([
            'id' => 7,
            'parent_id' => 6,
            'name' => 'About service block',
        ]);

        TemplateBlock::create([
            'id' => 8,
            'parent_id' => 6,
            'name' => 'Why Vietnam block',
        ]);

        TemplateBlock::create([
            'id' => 9,
            'parent_id' => 6,
            'name' => 'Message from CEO block',
        ]);
    }
}
