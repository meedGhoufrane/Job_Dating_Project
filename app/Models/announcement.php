<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class announcement extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','description','company_id'

    ];

    public function Company()
    {
        return $this->belongsTo(Company::class);
    }
}
