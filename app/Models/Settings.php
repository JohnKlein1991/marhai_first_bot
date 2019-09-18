<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    public $timestamps = false;

    public static function getSettings($key = null)
    {
        $settings =  $key ? self::where('key', $key)->first() : self::all();

        $collection = collect();
        foreach ($settings as $setting){
            $collection->put($setting->key, $setting->value);
        }
        return $collection;
    }
}
