<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function register()
    {
        Auth::logout();
        return redirect('/');
    }
}
