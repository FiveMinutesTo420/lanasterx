<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Gender;
use App\Models\Season;
use App\Models\Type;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       
     
        $categories = Category::all();
  
        
        view()->share('categories_service', compact('categories'));
   
    }
}
