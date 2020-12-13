<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumberLimit extends Model
{
    use HasFactory;

    protected $table = 'number_limits';

    protected $fillable = [
        'number_limit',
        'payment_amount_percent',
        'payment_amount_baht',
        'batch_id'
    ];

}
