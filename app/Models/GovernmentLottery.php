<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GovernmentLottery extends Model
{
    use HasFactory;

    protected $table = 'government_lotterys';

    protected $fillable = [
        'first_prize',
        'three_digit_prefix_1',
        'three_digit_prefix_2',
        'three_digit_suffix_1',
        'three_digit_suffix_2',
        'two_digit_suffix'
    ];

}
