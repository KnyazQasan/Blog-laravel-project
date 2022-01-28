<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function getAdmin(){
        $users = DB::table('users')->select('name','email','created_at','updated_at')->get();
        return view('Admin.user.user',[
            'users'=>$users
        ]);
       
        // return view('Admin.user');
    }
}
