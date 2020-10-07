<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

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
        Validator::extend('franjaHorariaOut', function ($attribute, $value, $parameters, $validator) {

           
            $start = Carbon::createFromFormat('Y-m-d H:i:s', $parameters[0]);
            $finish = Carbon::createFromFormat('Y-m-d H:i:s', $value);
            $diff = Carbon::parse($finish)->diffInHours(Carbon::parse($start));

                if(((int)$diff > $parameters[2]) || ((int)$diff < $parameters[3]))return false;

                return true;
        });
    }
}
