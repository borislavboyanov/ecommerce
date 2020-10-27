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
    public function run()
    {
        $client = Client::create([
            'uuid' => Str::uuid(),
            'email' => 'email@gmail.com',
            'password' => bcrypt('123'),
            'fullName' => 'Test',
            'activationKey' => Str::uuid(),
            'passwordRecovery' => Str::uuid()
        ]);

        for($i = 1; $i <= 30; $i++) {
            Product::create([
                'name' => 'Product '.$i,
                'description' => 'Description '.$i,
                'quantity' => rand(10, 100),
                'price' => rand(100, 1000)
            ]);
        }

        for($i = 1; $i <= 5; $i++) {
            $client->items()->create([
                'product_id' => Product::all()->random()->id,
                'quantity' => rand(1, 5),
                'price' => rand(10, 100)
            ]);
        }
    }
}
