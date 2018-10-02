<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Location;
use App\Department;
use App\Category;
use App\Supplier;

class SettingController extends Controller
{
    protected $user, $location, $category, $supplier, $department;

    public function __construct(User $user, Location $location, Department $department, Category $category, Supplier $supplier)
    {
        $this->user = $user;
        $this->location =$location;
        $this->category = $category;
        $this->supplier = $supplier;
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
            case 'category':
                $locations = $this->category->all();
                return view('setting.location', compact('locations'));
                break;
            case 'supplier':
                $locations = $this->supplier->all();
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
