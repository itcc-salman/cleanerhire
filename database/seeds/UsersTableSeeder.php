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
            [ "name" => "Carpet Cleaning", "rate_per_hour" => 0 , "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "company" => 1 ],
            [ "name" => "Wet Carpet Restoration", "rate_per_hour" => 0 , "residential" => 1, "commercial" => 1, "once_off" => 1, "regular" => 1, "individual" => 0, "company" => 1 ],
            [ "name" => "Water Damage Restoration", "rate_per_hour" => 0 , "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "company" => 1 ],
            [ "name" => "Flood Damage Restoration", "rate_per_hour" => 0 , "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "company" => 1 ],
            [ "name" => "Carpet Repairs", "rate_per_hour" => 0 , "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "company" => 1 ],
            [ "name" => "Timber Floor Drying", "rate_per_hour" => 0 , "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 0, "company" => 1 ],
            [ "name" => "Upholstery Cleaning", "rate_per_hour" => 0 , "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "company" => 1 ],
            [ "name" => "Tile and Grout Cleaning", "rate_per_hour" => 0 , "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "company" => 1 ],
            [ "name" => "Rug Cleaning", "rate_per_hour" => 0 , "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 0, "company" => 1 ],
            [ "name" => "Mould Removal", "rate_per_hour" => 0 , "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 0, "company" => 1 ],
            [ "name" => "Sewage Cleaning", "rate_per_hour" => 0 , "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "company" => 1 ],
            [ "name" => "Fire Smoke Restoration", "rate_per_hour" => 0 , "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "company" => 1 ],
            [ "name" => "Mattress Cleaning", "rate_per_hour" => 0 , "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "company" => 1 ],
            [ "name" => "Structure Drying", "rate_per_hour" => 0 , "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "company" => 1 ],
            [ "name" => "Odour Control", "rate_per_hour" => 0 , "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "company" => 1 ],
            [ "name" => "Anti-Bacterial Treatment", "rate_per_hour" => 0 , "residential" => 1, "commercial" => 1, "once_off" => 0, "regular" => 1, "individual" => 1, "company" => 1 ]
        ];
        foreach ($cleaning_services as $cs) {
            DB::table('cleaning_services')->insert([
                'name' => $cs['name'],
                'rate_per_hour' => $cs['rate_per_hour'],
                'residential' => $cs['residential'],
                'commercial' => $cs['commercial'],
                'once_off' => $cs['once_off'],
                'regular' => $cs['regular'],
                'individual' => $cs['individual'],
                'company' => $cs['company'],
                'created_by' => 1,
                'updated_by' => 1,
                'status' => 1
            ]);
        }
    }
}
