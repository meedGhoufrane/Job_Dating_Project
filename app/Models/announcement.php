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
        'title','description','company_id','date'

    ];

    public function Company()
    {
        return $this->belongsTo(Company::class);
    }
    public function skills(): MorphToMany
    {
        return $this->morphedByMany(skills::class, 'skillbles','skillbles','skillbles_id','skill_id');
    }
    public function apply()
        {
            return $this->hasMany(apply::class);
        }

        public function hasUserRecordedapply($userId)
    {
        return $this->apply()->where('user_id', $userId)->exists();
    }

    public function unrecordapply($userId)
    {
        $this->apply()->where('user_id', $userId)->delete();
    }
}
