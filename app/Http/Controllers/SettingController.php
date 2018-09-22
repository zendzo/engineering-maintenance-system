<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Location;
use App\Department;

class SettingController extends Controller
{
    protected $user, $location, $department;

    public function __construct(User $user, Location $location, Department $department)
    {
        $this->user = $user;
        $this->location =$location;
        $this->department = $department;
    }

    public function showSettingType($type)
    {
        switch ($type) {
            case 'manager':
                $users = $this->user->where('role_id',3)->get();
                return $this->renderUserView($users);
                break;
            case 'engineer':
                $users = $this->user->where('role_id',4)->get();
                return $this->renderUserView($users);
                break;
            case 'location':
                $locations = $this->location->all();
                return view('setting.location', compact('locations'));
                break;
            default:
                $deparments = $this->department->all();
                return view('setting.department', compact('departments'));
                break;
        }
    }

    public function renderUserView($users)
    {
        return view('setting.users', compact('users'));
    }
}
