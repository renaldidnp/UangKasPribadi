<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            // Pemasukan
            ['name' => 'Gaji', 'type' => 'pemasukan', 'icon' => '💰'],
            ['name' => 'Bonus', 'type' => 'pemasukan', 'icon' => '🎁'],
            ['name' => 'Investasi', 'type' => 'pemasukan', 'icon' => '📈'],
            ['name' => 'Lainnya', 'type' => 'pemasukan', 'icon' => '💵'],
            
            // Pengeluaran
            ['name' => 'Makanan & Minuman', 'type' => 'pengeluaran', 'icon' => '🍔'],
            ['name' => 'Transport', 'type' => 'pengeluaran', 'icon' => '🚗'],
            ['name' => 'Belanja', 'type' => 'pengeluaran', 'icon' => '🛒'],
            ['name' => 'Tagihan', 'type' => 'pengeluaran', 'icon' => '📄'],
            ['name' => 'Hiburan', 'type' => 'pengeluaran', 'icon' => '🎮'],
            ['name' => 'Kesehatan', 'type' => 'pengeluaran', 'icon' => '🏥'],
            ['name' => 'Pendidikan', 'type' => 'pengeluaran', 'icon' => '📚'],
            ['name' => 'Lainnya', 'type' => 'pengeluaran', 'icon' => '💸'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}