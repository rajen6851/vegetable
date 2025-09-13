<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    public function index()
    {
        $users = User::where('role','customer')->get();
        
        return view('Admin.user.users', compact('users'));
    }
}
