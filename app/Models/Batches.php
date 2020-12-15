<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batches extends Model
{
    use HasFactory;

    protected $table = "batches";

    protected $fillable = [
        'lottery_date',
        'lottery_time'
    ];

    public function number_limits()
    {
        return $this->hasMany(NumberLimit::class);
    }

}
