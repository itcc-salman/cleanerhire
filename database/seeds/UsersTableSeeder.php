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
            [ "name" => "Regular", "rate_per_hour" => 25, "service_for" => "residential", "service_type" => "regular", "is_other_with_price" => 0, "price_calculation" => "direct", "minimum_service_hours" => 2 ],
            [ "name" => "Once off", "rate_per_hour" => 30, "service_for" => "residential", "service_type" => "once_off", "is_other_with_price" => 0, "price_calculation" => "direct", "minimum_service_hours" => 3 ],
            [ "name" => "End of Lease", "rate_per_hour" => 40, "service_for" => "residential", "service_type" => "end_of_lease", "is_other_with_price" => 0, "price_calculation" => "direct", "minimum_service_hours" => 3 ],
            [ "name" => "Carpet Cleaning", "rate_per_hour" => 25, "service_for" => "residential", "service_type" => "other", "is_other_with_price" => 1, "price_calculation" => "room", "minimum_service_hours" => 1 ],
            [ "name" => "Window Cleaning", "rate_per_hour" => 25, "service_for" => "residential", "service_type" => "other", "is_other_with_price" => 1, "price_calculation" => "panel", "minimum_service_hours" => 1 ],
            [ "name" => "Tile & Grout Cleaning", "rate_per_hour" => 25, "service_for" => "residential", "service_type" => "other", "is_other_with_price" => 1, "price_calculation" => "sq", "minimum_service_hours" => 1 ],
            [ "name" => "Water Damage Restoration", "rate_per_hour" => 0, "service_for" => "residential", "service_type" => NULL, "is_other_with_price" => 0, "price_calculation" => NULL, "minimum_service_hours" => 0 ],
            [ "name" => "Flood Damage Restoration", "rate_per_hour" => 0, "service_for" => "residential", "service_type" => NULL, "is_other_with_price" => 0, "price_calculation" => NULL, "minimum_service_hours" => 0 ],
            [ "name" => "Carpet Repairs", "rate_per_hour" => 0, "service_for" => "residential", "service_type" => NULL, "is_other_with_price" => 0, "price_calculation" => NULL, "minimum_service_hours" => 0 ],
            [ "name" => "Upholstery Cleaning", "rate_per_hour" => 0, "service_for" => "residential", "service_type" => NULL, "is_other_with_price" => 0, "price_calculation" => NULL, "minimum_service_hours" => 0 ],
            [ "name" => "Rug Cleaning", "rate_per_hour" => 0, "service_for" => "residential", "service_type" => NULL, "is_other_with_price" => 0, "price_calculation" => NULL, "minimum_service_hours" => 0 ],
            [ "name" => "Mattress Cleaning", "rate_per_hour" => 0, "service_for" => "residential", "service_type" => NULL, "is_other_with_price" => 0, "price_calculation" => NULL, "minimum_service_hours" => 0 ],
            [ "name" => "Mould Removal", "rate_per_hour" => 0, "service_for" => "residential", "service_type" => NULL, "is_other_with_price" => 0, "price_calculation" => NULL, "minimum_service_hours" => 0 ],
        ];

        foreach ($cleaning_services as $cs) {
            DB::table('cleaning_services')->insert([
                'name' => $cs['name'],
                'rate_per_hour' => $cs['rate_per_hour'],
                'service_for' => $cs['service_for'],
                'service_type' => $cs['service_type'],
                'is_other_with_price' => $cs['is_other_with_price'],
                'price_calculation' => $cs['price_calculation'],
                'minimum_service_hours' => $cs['minimum_service_hours'],
                'created_by' => 1,
                'updated_by' => 1,
                'status' => 1
            ]);
        }
    }
}
