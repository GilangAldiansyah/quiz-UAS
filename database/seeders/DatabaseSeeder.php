<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Product::factory()->create([
            'nama_produk' => 'Sepatu Sneakers',
            'harga' => '500000',
            'stok' => '10',
        ]);
        \App\Models\Product::factory()->create([
            'nama_produk' => 'Sepatu Futsal',
            'harga' => '600000',
            'stok' => '0',
        ]);
        \App\Models\Product::factory()->create([
            'nama_produk' => 'Sepatu Bola',
            'harga' => '700000',
            'stok' => '5',
        ]);
    }
}