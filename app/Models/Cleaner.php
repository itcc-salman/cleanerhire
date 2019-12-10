<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

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
        return !empty($value) ? $value : '-';
    }

    /**
     * Get the city.
     *
     * @param  string  $value
     * @return string
    */
    public function getCityAttribute($value)
    {
        return !empty($value) ? $value : '-';
    }

    /**
     * Get the date of birth.
     *
     * @param  string  $value
     * @return string
    */
    public function getDateOfBirthAttribute($value)
    {
        if( !empty($value) ) {
            return Carbon::createFromFormat('Y-m-d', $value)->format('m/d/Y');
        }
        return $value;
    }

    /**
     * Set the cleaner's Date of Birth.
     *
     * @param  string  $value
     * @return void
     */
    public function setDateOfBirthAttribute($value)
    {
        if( !empty($value) ) {
            $this->attributes['date_of_birth'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
        }
    }

    /**
     * Get all of the services for the cleaner.
     */
    public function services()
    {
        return $this->belongsToMany('App\Models\CleaningServices', 'cleaner_service_mappings', 'cleaner_id', 'cleaning_service_id');
    }

    public function cleanerServices()
    {
        return $this->hasMany('App\Models\CleanerServiceMapping');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
