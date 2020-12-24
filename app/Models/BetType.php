<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BetType extends Model
{
    use HasFactory;
    
    protected $table = "bet_types";

    protected $fillable = [
        "name",
        "flag_calculate",
        "flag_code ",
        "reward_amount_baht",
        "cal_type"
    ];
    
}
