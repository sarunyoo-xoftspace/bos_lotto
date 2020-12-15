<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LotteryBet extends Model
{
    use HasFactory;

    protected $table = "lottery_bets";
    protected $fillable = [
        'customer_name',
        'mobile',
        'number_bet',
        'type_id'
    ];

}
