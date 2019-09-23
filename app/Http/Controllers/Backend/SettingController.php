<?php

namespace App\Http\Controllers\Backend;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client as GuzzleClient;
use Telegram\Bot\Laravel\Facades\Telegram;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Settings::getSettings();
        return view('backend.setting.index', compact('settings'));
    }
    public function store(Request $request)
    {
        Settings::where('key', '!=', NULL)->delete();
        $data = $request->except('_token');
        foreach ($data as $key => $item){
            $setting = new Settings();
            $setting->key = $key;
            $setting->value = $item;
            $setting->save();
        }

        return redirect()->route('admin.setting.index');
    }
    public function setWebhook(Request $request)
    {
        $result = $this->sendTelegramData(
            'setwebhook',
            [
            'query' => [
                'url' => $request->url()
            ]
        ]);
        return redirect()->route('admin.setting.index')->with('status',  $result);
    }
    public function getWebhookInfo(Request $request)
    {
        $result = $this->sendTelegramData('getWebhookInfo');
        return redirect()->route('admin.setting.index')->with('status',  $result);
    }
    public function sendTelegramData($route = '', $params = [], $method = 'post')
    {
         $client = new GuzzleClient([
             'base_uri' => 'https://api.telegram.org/bot' . Telegram::getAccessToken() . '/'
         ]);
         $result = $client->request($method, $route, $params);
         return (string) $result->getBody();
    }
}
