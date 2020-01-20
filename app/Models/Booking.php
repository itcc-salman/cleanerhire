<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;
    protected $appends = ['formattedStatus'];

    const STATUS_CREATED            = 0;
    const STATUS_PENDING            = 1;
    const STATUS_APPOINTED          = 2;
    const STATUS_INPROGRESS         = 3;
    const STATUS_COMPLETED          = 4;
    const STATUS_CANCELLED          = 5;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function getFormattedStatusAttribute()
    {
        if($this->status == Self::STATUS_CREATED){
            return 'Created';
        }elseif ($this->status == Self::STATUS_PENDING) {
            return 'Pending';
        }elseif ($this->status == Self::STATUS_APPOINTED) {
            return 'Appointed';
        }elseif ($this->status == Self::STATUS_INPROGRESS) {
            return 'In Progress';
        }elseif ($this->status == Self::STATUS_COMPLETED) {
            return 'Completed';
        }elseif ($this->status == Self::STATUS_CANCELLED) {
            return 'Cancelled';
        }else{
            return '---';
        }
    }

    public function scopeCreated($query)
    {
        return $query->where('status', 0);
    }

    public function scopePending($query)
    {
        return $query->where('status', 1);
    }

    public function scopeAppointed($query)
    {
        return $query->where('status', 2);
    }

    public function scopeInprogress($query)
    {
        return $query->where('status', 3);
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 4);
    }

    public function scopecancelled($query)
    {
        return $query->where('status', 5);
    }
}
