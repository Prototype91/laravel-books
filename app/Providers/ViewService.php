<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class ViewService extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        view()->composer(["partials.menu"], function ($view) use ($request) {

            $admin = false;

            if ($request->user()) {
                switch ($request->user()->elevation) {
                    case "admin":
                        $admin = true;
                        break;
                }
            }
            $view->with([
                "isAdmin" => $admin,
            ]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
