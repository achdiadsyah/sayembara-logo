<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JourneyHistory extends Model
{
    use HasFactory;
    use Uuids;

    protected $fillable = [
        'user_id',
        'journey_id',
    ];

    public function journey()
    {
        return $this->belongsTo(Journey::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
