<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $fillable = [
        'finish_at',
        'priority',
        'location_id',
        'category_id',
        'job',
        'order_by',
        'follow_up',
        'departement_id',
        'status'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderBy()
    {
        return $this->belongsTo(User::class);
    }

    public function followUpBy()
    {
        return $this->belongsTo(User::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
}
