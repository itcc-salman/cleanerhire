<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;
    protected $appends = ['formattedStatus'];

    const STATUS_NEW                    = 0;
    const STATUS_PENDING                = 1;
    const STATUS_ASSIGNED               = 2;
    const STATUS_INPROGRESS             = 3;
    const STATUS_COMPLETED              = 4;
    const STATUS_APPROVED               = 5;
    const STATUS_CANCELLED              = 6;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function cleaner()
    {
        return $this->belongsTo('App\Models\Cleaner', 'assigned_cleaner_id', 'id');
    }

    public function getFormattedStatusAttribute()
    {
        if($this->status == Self::STATUS_NEW){
            return 'New';
        }elseif ($this->status == Self::STATUS_PENDING) {
            return 'Pending';
        }elseif ($this->status == Self::STATUS_ASSIGNED) {
            return 'Assigned';
        }elseif ($this->status == Self::STATUS_INPROGRESS) {
            return 'In Progress';
        }elseif ($this->status == Self::STATUS_COMPLETED) {
            return 'Completed';
        }elseif ($this->status == Self::STATUS_APPROVED) {
            return 'Approved';
        }elseif ($this->status == Self::STATUS_CANCELLED) {
            return 'Cancelled';
        }else{
            return '---';
        }
    }

    public function scopeNew($query)
    {
        return $query->where('status', 0);
    }

    public function scopePending($query)
    {
        return $query->where('status', 1);
    }

    public function scopeAssigned($query)
    {
        return $query->where('status', 2);
    }

    public function scopeInProgress($query)
    {
        return $query->where('status', 3);
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 4);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 5);
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', 6);
    }

    public function service()
    {
        if( strpos($this->services, ',') !== false ) {
            $services = ($this->services != '' ) ? explode(',', $this->services) : [];
            if($services) {
               return CleaningServices::where('id',$services)->get();
            }
        } else {
            return $this->belongsTo('App\Models\CleaningServices', 'services', 'id');
        }

    }
}
