<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillabel = ['name'];

    public function WorkOrder()
    {
        return $this->hasMany(WorkOrder::class);
    }
}
