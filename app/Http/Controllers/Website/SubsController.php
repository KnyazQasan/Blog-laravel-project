<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubsController extends Controller
{
    public function getSubs(){
        return view('Website.active');
        
    }
}
