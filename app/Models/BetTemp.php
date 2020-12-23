<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BetTemp extends Model
{
    use HasFactory;
    
    protected $table = "bet_temps";

    protected $fillable = [
        'bet_number',
        'amount_baht',
        'bet_type',
        'bet_type_id',
        'amount_reward'
    ];
}
