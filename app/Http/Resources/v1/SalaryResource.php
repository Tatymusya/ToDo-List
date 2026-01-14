<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SalaryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'year' => $this->year,
            'month' => $this->month,
            'salary' => $this->salary,
            'prepayment' => $this->prepayment,
            'bonus' => $this->bonus,
            'underworking' => $this->underworking,
            'currency_id' => $this->currency_id,
            'created_at' => Carbon::parse($this->created_at)->format('d.m.Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d.m.Y'),
        ];
    }
}
