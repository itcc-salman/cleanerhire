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
     * Get the phone number.
     *
     * @param  string  $value
     * @return string
    */
    public function getPhoneAttribute($value)
    {
        return !empty($value) ?: '-';
    }

    /**
     * Get the city.
     *
     * @param  string  $value
     * @return string
    */
    public function getCityAttribute($value)
    {
        return !empty($value) ?: '-';
    }

    /**
     * Get all of the services for the cleaner.
     */
    public function services()
    {
        return $this->belongsToMany('App\Models\CleaningServices', 'cleaner_service_mappings', 'cleaner_id', 'cleaning_service_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
