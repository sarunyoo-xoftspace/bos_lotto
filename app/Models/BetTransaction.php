<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BetTransaction extends Model
{
    use HasFactory;

        
    protected $table = "bet_transactions";

    protected $fillable = [
        'bet_customer_name',
        'bet_customer_mobile',
        'bet_number',
        'bet_amount',
        'bet_type_id',
        'payment_status'
    ];
}
