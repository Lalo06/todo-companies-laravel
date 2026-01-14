<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }
}
