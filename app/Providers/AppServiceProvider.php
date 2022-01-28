<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\News;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $settings = Setting::first();
        View::share('mySettings',$settings);
        $category = Category::all();
        View::share('menuCategory',$category);
        $date = \Carbon\Carbon::today()->subDays(7);
        $lastweek = News::where('created_at', '>=', $date)->orderBy('reading_count','desc')->limit(5)->get();
        View::share('trendAtWeek',$lastweek);
      
    }
}
