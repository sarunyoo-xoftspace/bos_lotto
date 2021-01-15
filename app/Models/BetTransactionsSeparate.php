<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BetTransactionsSeparate extends Model
{
    use HasFactory;

    protected $table = "bet_transactions_separate";

    protected $fillable = [
        'bet_customer_name',
        'bet_customer_mobile',
        'bet_number',
        'bet_amount',
        'bet_type_id',
        'flag_is_correct',
        'payment_status',
        'payment_amount'
    ];

}
