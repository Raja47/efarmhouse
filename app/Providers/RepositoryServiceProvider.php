<?php

namespace App\Providers;

use App\Contracts\CategoryContract;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
//use App\Contracts\AttributeContract;
// use App\Repositories\AttributeRepository;
// use App\Contracts\BrandContract;
// use App\Repositories\BrandRepository;
// use App\Contracts\ProductContract;
// use App\Repositories\ProductRepository;
// use App\Contracts\OrderContract;
// use App\Repositories\OrderRepository;
// use App\Contracts\BannerContract;
// use App\Repositories\BannerRepository;
// use App\Contracts\CategoryBannerContract;
// use App\Repositories\CategoryBannerRepository;
// use App\Contracts\UserContract;
// use App\Repositories\UserRepository;
// use App\Contracts\CouponAndDealContract;
// use App\Repositories\CouponAndDealRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        CategoryContract::class         =>          CategoryRepository::class,
        //AttributeContract::class        =>          AttributeRepository::class,
        //BrandContract::class            =>          BrandRepository::class,
        //ProductContract::class          =>          ProductRepository::class,
        //OrderContract::class            =>          OrderRepository::class,
        //BannerContract::class           =>          BannerRepository::class,
        //CategoryBannerContract::class   =>          CategoryBannerRepository::class,
        //UserContract::class             =>          UserRepository::class,
        //CouponAndDealContract::class    =>          CouponAndDealRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }
}
