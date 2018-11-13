<?php

use Illuminate\Database\Seeder;
use App\Phone;

class PhoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Phone::create([
            'brand' => 'Xiaomi',
            'model' => 'Pochopone F1'
        ]);

        Phone::create([
            'brand' => 'Xiaomi',
            'model' => 'Mi 8 Lite'
        ]);

        Phone::create([
            'brand' => 'Xiaomi',
            'model' => 'Mi A2'
        ]);

        Phone::create([
            'brand' => 'Xiaomi',
            'model' => 'Mi A2 Lite'
        ]);

        Phone::create([
            'brand' => 'Xiaomi',
            'model' => 'Mi A1'
        ]);

        Phone::create([
            'brand' => 'Xiaomi',
            'model' => 'Redmi Note 6 Pro'
        ]);

        Phone::create([
            'brand' => 'Xiaomi',
            'model' => 'Redmi 6'
        ]);

        Phone::create([
            'brand' => 'Xiaomi',
            'model' => 'Redmi 6A'
        ]);

        Phone::create([
            'brand' => 'Xiaomi',
            'model' => 'Redmi Note 5'
        ]);

        Phone::create([
            'brand' => 'Xiaomi',
            'model' => 'Redmi S2'
        ]);

        Phone::create([
            'brand' => 'Xiaomi',
            'model' => 'Redmi 5'
        ]);

        Phone::create([
            'brand' => 'Samsung',
            'model' => 'Galaxy S9'
        ]);

        Phone::create([
            'brand' => 'Samsung',
            'model' => 'Galaxy S9+'
        ]);

        Phone::create([
            'brand' => 'Samsung',
            'model' => 'Galaxy S7 Edge'
        ]);

        Phone::create([
            'brand' => 'Samsung',
            'model' => 'Galaxy Note9'
        ]);

        Phone::create([
            'brand' => 'Samsung',
            'model' => 'Galaxy Note8'
        ]);

        Phone::create([
            'brand' => 'Samsung',
            'model' => 'Galaxy Note5'
        ]);

        Phone::create([
            'brand' => 'Samsung',
            'model' => 'Galaxy A7'
        ]);

        Phone::create([
            'brand' => 'Samsung',
            'model' => 'Galaxy A8 Star'
        ]);

        Phone::create([
            'brand' => 'Samsung',
            'model' => 'Galaxy A6+'
        ]);
    }
}
