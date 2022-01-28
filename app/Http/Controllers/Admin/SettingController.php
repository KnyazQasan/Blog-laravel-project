<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\SettingsRequest;
use Carbon\Carbon;
use Illuminate\Support\Str;


class SettingController extends Controller
{
    public function getAdminSetting(){
        $setting = Setting::first();
        return view('Admin.settings.settings',[
            'settings'=>$setting
        ]);
    }
    public function editSettings(){
        $setting = Setting::first();
        return view('Admin.settings.edit-settings',[
            'settings'=>$setting
        ]);
    }
    public function editSettingsPost(SettingsRequest $request){
        Setting::first()->update([
            'name' => $request->get('name'),
            'subtext' => $request->get('subscribe'),
            'copyright' => $request->get('copyright'),
            'facebook' => $request->get('facebook_link'),
            'instagram' => $request->get('instagram_link'),
            'twitter' => $request->get('twitter_link')
        ]);
        return redirect()->route('getAdminSetting');

    }
}
