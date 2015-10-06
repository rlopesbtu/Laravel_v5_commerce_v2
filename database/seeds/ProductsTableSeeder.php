<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Product;
use Faker\Factory as Faker;


class ProductsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('products')->truncate();

     $faker = Faker::create();

        foreach(range(1,15) as $i){

            Product::create([
                'name' => $faker->word(),
                'description' => $faker->sentence(),
                'price' => $faker->numberBetween($min = 1000, $max = 9000),
                'featured' => $faker->numberBetween($min = 0, $max = 1),
                'recommend'=> $faker->numberBetween($min = 0, $max = 1)
            ]);

        }


    }

}


?>