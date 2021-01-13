<?php

namespace App\Providers;

use Cart;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Video;


use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('site.partials.header', function ($view) {
            $view->with('cartCount', Cart::getContent()->count());
        });
          
        View::composer('site.partials.header', function ($view) {
            $view->with('categories',Category::with('products.brand')->where('menu',1)->orWhere('name','Root')->orderByRaw('-name DESC')->get()->nest());
        });
        
        View::composer( 'site.pages.homepage', function ($view) {
             $view->with( 'banners',Banner::where('status',1)->get());
        });

         // Brands 
        View::composer( 'site.pages.homepage', function ($view) {
             $view->with( 'brands',Brand::get()->take(20) );
        });

        // Categories
        View::composer('site.pages.homepage', function ($view) {
             $view->with('featuredCategories',Category::where('featured',1)->where('name','!=','Root')->get()->take(5));
        });

        // Products
         View::composer('site.pages.homepage', function ($view) {
              $view->with('featuredProducts',  Product::where('featured', 1)->with('images')->orderBy('id', 'Desc')->get()->take(8) );
         });

        // Caeggories
        View::composer('site.pages.homepage', function ($view) {
             $view->with('mainCategories',Category::where('main',1)->where('name','!=','Root')->get()->take(4));
        });

         View::composer( 'site.pages.homepage', function ($view) {
             $view->with('videos' , Video::all());
        });

        View::composer('site.partials.footer', function ($view) {
             $view->with('footerCategories',Category::where('main',1)->where('name','!=','Root')->where('parent_id','1')->get());
        });
        
        View::composer('site.partials.footer', function ($view) {
             $view->with('footerBrands',Brand::get()->take(6));
        });


    }
}
