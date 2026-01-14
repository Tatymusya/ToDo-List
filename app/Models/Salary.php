<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'month',
        'salary',
        'prepayment',
        'bonus',
        'underworking',
        'currency_id'
    ];

    public function currency(): BelongsTo
    {
        return $this->BelongsTo(Currency::class);
    }
}
