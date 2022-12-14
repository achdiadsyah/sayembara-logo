<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    use HasFactory;
    use Uuids;

    protected $guarded = [];

    protected $fillable = [
        'name',
        'slug',
        'order_number',
        'description',
    ];
}
