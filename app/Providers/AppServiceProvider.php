<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Validator;

use App\Catalog;

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

        View::composer('layouts.user',function($view){
            $cat = Catalog::where('cat_status',1)->get();
            $view->with('cat',$cat);
        });

        Validator::extend('in_phone',function($attr,$value,$param){
            return strlen($value)==10 && substr($value,0,1)==='0';
        });
        Validator::extend('birth_day',function($attr,$value,$param){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $now=date('Y');
            $day=substr($value,0,4);
            $time = $now - $day;
            return $time >=15;
        });
    }
}
