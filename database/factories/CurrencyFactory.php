<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Country;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Currency>
 */
class CurrencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'currency' => 'Российский рубль',
            'code' => 'RUB',
            'number' => 643,
            'country_id' => Country::where('name', '=', 'Россия')->first()->id,
        ];
    }
}
