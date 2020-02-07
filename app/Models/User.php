<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\PasswordReset;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'role',
        'password',
        'activated',
        'token',
        'signup_ip_address',
        'signup_confirmation_ip_address',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'activated', 'token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Set the post title.
     *
     * @param  string  $value
     * @return string
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    public function isAdmin()
    {
        if( $this->role == 'superadmin' || $this->role == 'admin' )
            return true;
        return false;
    }

    public function isCleaner()
    {
        if( $this->role == 'cleaner' || $this->role == 'company' )
            return true;
        return false;
    }

    public function isCustomer()
    {
        if( $this->role == 'customer' )
            return true;
        return false;
    }

    public function cleaner()
    {
        return $this->hasOne('App\Models\Cleaner', 'user_id');
    }

    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'user_id');
    }

    public static function boot() {
        parent::boot();
        User::created(function ($model) {
            $token = app('auth.password.broker')->createToken($model);
            $model->notify(new PasswordReset($token));
        });
    }

}
