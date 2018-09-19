<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullNameAttribute()
    {
        return $this->profile->first_name.' '.$this->profile->last_name ? $this->username : $this->email;
    }

    public function getAvatarAttribute()
	{
		if (!is_null($this->profile)) {
            return $this->profile->avatar;
        }
       return sprintf('https://www.gravatar.com/avatar/%s?s=100',md5($this->email));
	}

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function workOrder()
    {
        return $this->hasMany(WorkOrder::class);
    }

    public function followUp()
    {
        return $this->hasMany(WorkOrder::class);
    }
}
