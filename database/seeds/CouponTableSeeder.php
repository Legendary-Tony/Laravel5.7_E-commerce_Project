<?php

use App\Coupon;
use Illuminate\Database\Seeder;

class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
        	'code' => 'ABC123',
        	'type' => 'fixed',
        	'value' => 10, 
        ]);

        Coupon::create([
        	'code' => 'ABC456',
        	'type' => 'percent',
        	'percent_off' => 5.00, 
        ]);
    }
}
