<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $fillable = [
        'name','discription'

    ];

    public function announcements()
    {
        return $this->hasMany(announcement::class);
    }

    // public static function boot(){
    //     parent::boot();
    //     static::deleting(function(Company $partner){
    //         $partner->adverts()->delete();
    //     });
    // }
    
}
