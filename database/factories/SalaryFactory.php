<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Salary;
use App\Models\Currency;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salary>
 */
class SalaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = $this->faker->unique()->dateTimeBetween('2025-01-01', '2025-12-31');
        $uniqueMonthDate = $date->format('2025-m-01');
        return [
            'year' => $this->faker->numberBetween(2025, 2025),
            'month' => $uniqueMonthDate,
            'salary' => $this->faker->numberBetween(76000, 98000),
            'prepayment' => $this->faker->numberBetween(56000, 68000),
            'bonus' => $this->faker->numberBetween(36000, 44000),
            'underworking' => $this->faker->numberBetween(10000, 15000),
            'currency_id' => Currency::where('code', '=', 'RUB')->first()->id,
        ];
    }
}
