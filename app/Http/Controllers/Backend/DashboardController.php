<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Telegram\Bot\Laravel\Facades\Telegram;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard.index');
    }
}
