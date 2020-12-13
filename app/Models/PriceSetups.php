<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceSetups extends Model
{
    use HasFactory;

    protected $table = "price_setups";

    protected $fillable = [
        'three_top_baht',
        'three_tod_baht',
        'three_bottom_baht',
        'three_prefix_baht',
        'two_top_baht',
        'two_bottom_baht',
        'run_top_baht',
        'run_bottom_baht'
    ];
}
