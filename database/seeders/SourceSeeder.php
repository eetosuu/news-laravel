<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('source')->insert($this->getData());
    }

    public function getData(): array
    {
        $quantitySource = 10;
        $source = [];
        for ($i = 0; $i < $quantitySource; $i++) {
            $source[] = [
                'source' => fake()->url()
            ];
        }

        return $source;
    }
}
