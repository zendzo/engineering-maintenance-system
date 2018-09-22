<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceTask extends Model
{
    protected $fillable = ['task','maintenance_event_id'];

    public function event()
    {
        return $this->belongsTo(MaintenanceEvent::class);
    }
}
