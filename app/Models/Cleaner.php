<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cleaner extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
    ];

    /**
     * Get all of the services for the cleaner.
     */
    public function services()
    {
        return $this->belongsToMany('App\Models\CleaningServices', 'cleaner_service_mappings', 'cleaner_id', 'cleaning_service_id');
    }

}
