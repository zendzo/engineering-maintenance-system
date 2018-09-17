<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $fillable = ['name'];

    public function workOrder()
    {
        return $this->hasMany(WorkOrder::class);
    }
}
