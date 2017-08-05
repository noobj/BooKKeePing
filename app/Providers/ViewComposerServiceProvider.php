<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.head', function($view)
        {
            $records = \App\Record::where('created_at', '=', \Carbon\Carbon::today())->get();
            $sum = 0;

            foreach ($records as $record) {
                $sum += $record->amount;
            }

            $tagList = \App\Tag::pluck('name', 'name');
            $categoryList = \App\Category::pluck('name', 'id');

            $view->with(['sum' => $sum, 'tagList' => $tagList, 'categoryList' => $categoryList]);
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
