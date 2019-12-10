<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CleanerServiceMapping extends Model
{
    public function service()
    {
        return $this->belongsTo('App\Models\CleaningServices','cleaning_service_id','id');
    }
    public function cleaner()
    {
        return $this->belongsTo('App\Models\Cleaner');
    }
}
