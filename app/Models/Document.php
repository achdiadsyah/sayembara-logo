<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    use Uuids;

    protected $fillable = [
        'user_id',
        'folder_name',
        'file',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
