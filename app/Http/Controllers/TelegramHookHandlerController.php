<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramHookHandlerController extends Controller
{
    public function handle()
    {
        Telegram::commandsHandler(true);
    }
}
