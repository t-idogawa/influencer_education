<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // カタカナ
        Validator::extend('kana', function ($attribute, $value, $parameters, $validator) {
            // return preg_match('\A[ァ-ヴー]+\z/u', $value);
            return preg_match('/\A[ァ-ヴ]+\z/u', $value);
        });
    }
}
