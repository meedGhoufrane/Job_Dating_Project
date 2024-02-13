<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apply extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'announcement_id',
    ];
    protected $table = 'applyuser';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function announcement()
    {
        return $this->belongsTo(announcement::class);
    }
}

