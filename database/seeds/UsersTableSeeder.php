<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Superadmin',
            'last_name' => '',
            'email' => 'admin@itccdigital.com',
            'role' => 'superadmin',
            'password' => Hash::make('123456'),
            'token' => Str::random(64),
            'status' => 1
        ]);

        $cleaning_services = [
            [ "name" => "Carpet Cleaning", "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "agency" => 1 ],
            [ "name" => "Wet Carpet Restoration", "residential" => 1, "commercial" => 1, "once_off" => 1, "regular" => 1, "individual" => 0, "agency" => 1 ],
            [ "name" => "Water Damage Restoration", "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "agency" => 1 ],
            [ "name" => "Flood Damage Restoration", "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "agency" => 1 ],
            [ "name" => "Carpet Repairs", "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "agency" => 1 ],
            [ "name" => "Timber Floor Drying", "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 0, "agency" => 1 ],
            [ "name" => "Upholstery Cleaning", "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "agency" => 1 ],
            [ "name" => "Tile and Grout Cleaning", "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "agency" => 1 ],
            [ "name" => "Rug Cleaning", "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 0, "agency" => 1 ],
            [ "name" => "Mould Removal", "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 0, "agency" => 1 ],
            [ "name" => "Sewage Cleaning", "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "agency" => 1 ],
            [ "name" => "Fire Smoke Restoration", "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "agency" => 1 ],
            [ "name" => "Mattress Cleaning", "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "agency" => 1 ],
            [ "name" => "Structure Drying", "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "agency" => 1 ],
            [ "name" => "Odour Control", "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "agency" => 1 ],
            [ "name" => "Anti-Bacterial Treatment", "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "agency" => 1 ]
        ];
        foreach ($cleaning_services as $cs) {
            DB::table('cleaning_services')->insert([
                'name' => $cs['name'],
                'residential' => $cs['residential'],
                'commercial' => $cs['commercial'],
                'once_off' => $cs['once_off'],
                'regular' => $cs['regular'],
                'individual' => $cs['individual'],
                'agency' => $cs['agency'],
                'created_by' => 0,
                'updated_by' => 0,
                'status' => 1
            ]);
        }
    }
}
