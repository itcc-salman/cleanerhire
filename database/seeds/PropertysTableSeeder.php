<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $properties = [ 'office', 'ware house', 'education facility','body & owner corp','sport facility & gym','pubs and restaurant','government and council','child care','medical facility','adge care','industrial' ];
        foreach ($properties as $p) {
            DB::table('properties')->insert([
                'name' => $p,
                'created_by' => 1,
                'updated_by' => 1,
            ]);
        }
    }
}
