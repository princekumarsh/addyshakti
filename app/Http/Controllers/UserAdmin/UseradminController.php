<?php

namespace App\Http\Controllers\UserAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UseradminController extends Controller
{
    public function index()
    {
        return view('userAdmin.index');
    }
}
