<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subs;

class Subscribers extends Controller
{
    public function getAdminSubs(){
        $subs = Subs::all();
        return view('Admin.subs.subscribers',[
            'subs'=> $subs
        ]);
    }
    public function deleteSubs($id){
        Subs::find($id)->delete();
        return redirect()->route('getAdminSubs');

    }
}
