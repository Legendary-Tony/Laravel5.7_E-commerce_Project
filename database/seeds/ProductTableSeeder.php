<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Product::create([
            'name' => 'Id enim volumus',
            'image' => 'https://s3.eu-west-2.amazonaws.com/laravelecommerce/ecom/bootstrap-women-ware1.jpg',
            'description' => 'id contendimus; ut officii fructus sit ipsum officium.
            Lorem ipsum dolor sit amet; consectetur adipiscing elit. Mihi; inquam; qui te id ipsum rogavi? Fortemne possumus dicere eundem illum Torquatum? Apparet statim; quae sint officia; quae actiones. Duo Reges: constructio interrete.',
            'size' => 'Medium',
            'color' => 'white',
            'price' => '2600',
        ])->categories()->attach(3);
        

        Product::create([

            'image' => 'https://s3.eu-west-2.amazonaws.com/laravelecommerce/ecom/bootstrap-women-ware2.jpg',
            'name' => 'consectetur',
            'description' => 'id contendimus; ut officii fructus sit ipsum officium.
            Lorem ipsum dolor sit amet;  adipiscing elit. Mihi; inquam; qui te id ipsum rogavi? Fortemne possumus dicere eundem illum Torquatum? Apparet statim; quae sint officia; quae actiones. Duo Reges: constructio interrete.',
            'size' => 'Medium; Large',
            'color' => 'purple',
            'price' => '3500',
        ])->categories()->attach(3);


        Product::create([
            'image' => 'https://s3.eu-west-2.amazonaws.com/laravelecommerce/ecom/bootstrap-women-ware3.jpg',
            'name' => 'id contendimus',
            'description' => 'ut officii fructus sit ipsum officium.
            Lorem ipsum dolor sit amet; consectetur adipiscing elit. Mihi; inquam; qui te id ipsum rogavi? Fortemne possumus dicere eundem illum Torquatum? Apparet statim; quae sint officia; quae actiones. Duo Reges: constructio interrete.',
            'size' => 'Medium',
            'color' => 'purple and black',
            'price' => '2500',
        ])->categories()->attach(3);

        Product::create([
            'image' => 'https://s3.eu-west-2.amazonaws.com/laravelecommerce/ecom/bootstrap-women-ware4.jpg',
            'name' => 'Apparet statim',
            'description' => 'ut officii fructus sit ipsum officium; id contendimus.
            Lorem ipsum dolor sit amet; consectetur adipiscing elit. Mihi; inquam; qui te id ipsum rogavi? Fortemne possumus dicere eundem illum Torquatum? Apparet statim; quae sint officia; quae actiones. Duo Reges: constructio interrete.',
            'size' => 'Medium; Large',
            'color' => 'light pink',
            'price' => '5000',
        ])->categories()->attach(3);
        

        Product::create([
            'image' => 'https://s3.eu-west-2.amazonaws.com/laravelecommerce/ecom/bootstrap-women-ware5.jpg',
            'name' => 'constructio interrete',
            'description' => 'id contendimus; ut officii fructus sit ipsum officium.
            Lorem ipsum dolor sit amet; consectetur adipiscing elit. Mihi; inquam; qui te id ipsum rogavi? Fortemne possumus dicere eundem illum Torquatum? Apparet statim; quae sint officia; quae actiones. Duo Reges: constructio interrete.',
            'size' => 'Small; Medium; Large',
            'color' => 'white',
            'price' => '3500',
        ])->categories()->attach(4);
        

        Product::create([
            'image' => 'https://s3.eu-west-2.amazonaws.com/laravelecommerce/ecom/bootstrap-women-ware6.jpg',
            'name' => 'Fortemne possumus',
            'description' => 'id contendimus; ut officii fructus sit ipsum officium.
            Lorem ipsum dolor sit amet; consectetur adipiscing elit. Mihi; inquam; qui te id ipsum rogavi? Fortemne possumus dicere eundem illum Torquatum? Apparet statim; quae sint officia; quae actiones. Duo Reges: constructio interrete.',
            'size' => 'Medium; Large',
            'color' => 'red',
            'price' => '6500',
        ])->categories()->attach(4);
        
    }
}
