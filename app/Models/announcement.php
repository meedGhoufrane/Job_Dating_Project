<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    public function skills(): MorphToMany
    {
        return $this->morphedByMany(skills::class, 'skillbles','skillbles','skillbles_id','skill_id');
    }
}
