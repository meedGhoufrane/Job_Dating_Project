<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skills extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public function users()
    {
        return $this->morphedByMany(User::class, 'skillbles')->withTimestamps();
    }
    public function announcements()
    {
        return $this->morphedByMany(announcement::class, 'skillbles')->withTimestamps();
    }
}
