<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Client;
use App\Models\ClientCart;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
     function make_seed()
{
  list($usec, $sec) = explode(' ', microtime());
  return $sec + $usec * 1000000;
}

    public function run()
    {
      srand($this->make_seed());
      for($i = 1; $i <= 100; $i++) {
          Product::create([
              'name' => 'Product '.$i,
              'description' => 'Description '.$i,
              'quantity' => rand(10, 100),
              'price' => rand(1, 15),
              'featured' => rand(0, 1),
              'sale' => rand(0, 1),
              'sale_percentage' => rand(5, 90)
          ]);
      }

      for($i = 1; $i <= 10; $i++) {
        $client = Client::create([
            'uuid' => Str::uuid(),
            'email' => 'email'.$i.'@gmail.com',
            'password' => bcrypt('123'),
            'fullName' => 'Client '.$i,
            'activationKey' => Str::uuid(),
            'passwordRecovery' => Str::uuid()
        ]);
        srand($this->make_seed());
        $cartNum = rand(2, 10);
        for($j = 1; $j <= $cartNum; $j++) {
            $client->items()->create([
                'product_id' => Product::all()->random()->id,
                'quantity' => rand(1, 5),
                'price' => rand(10, 100)
            ]);
        }
      }
    }
}
