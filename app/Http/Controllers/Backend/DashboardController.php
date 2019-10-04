<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Telegram\Bot\Laravel\Facades\Telegram;

class DashboardController extends Controller
{
    public function index()
    {
        $response = Telegram::getMe();

        $botId = $response->getId();
        $firstName = $response->getFirstName();
        $username = $response->getUsername();
        echo $botId;
        echo $firstName;
        echo $username;
        return view('backend.dashboard.index');
    }
}
