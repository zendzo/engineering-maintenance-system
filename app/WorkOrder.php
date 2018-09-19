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

    protected $dates = ['finish_at'];

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
        return $this->belongsTo(User::class,'order_by');
    }

    public function followUpBy()
    {
        return $this->belongsTo(User::class,'follow_up');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
