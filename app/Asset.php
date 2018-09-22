<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'photo',
        'category_id',
        'location_id',
        'property',
        'merk',
        'model',
        'serial_number',
        'capacity',
        'purcashed_at',
        'supplier_id',
        'description',
    ];

    protected $dates = ['purcashed_at'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
