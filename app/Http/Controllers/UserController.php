<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
       $userCount = UserModel::where('level_id', 2)->count();
       return view('user', ['data' => $userCount]);
    }
}
