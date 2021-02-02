<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contracts\CategoryContract;
use App\Repositories\CategoryRepository;
use App\Contracts\CityContract;
use App\Repositories\CityRepository;
use App\Contracts\GroupContract;
use App\Repositories\GroupRepository;
use App\Contracts\FacilityContract;
use App\Repositories\FacilityRepository;
use App\Contracts\FarmhouseContract;
use App\Repositories\FarmhouseRepository;
use App\Contracts\UserContract;
use App\Repositories\UserRepository;

//use App\Contracts\AttributeContract;
// use App\Repositories\AttributeRepository;
// use App\Contracts\BrandContract;
// use App\Repositories\BrandRepository;
// use App\Contracts\OrderContract;
// use App\Repositories\OrderRepository;
// use App\Contracts\BannerContract;
// use App\Repositories\BannerRepository;
// use App\Contracts\CategoryBannerContract;
// use App\Repositories\CategoryBannerRepository;

// use App\Contracts\CouponAndDealContract;
// use App\Repositories\CouponAndDealRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        CategoryContract::class         =>          CategoryRepository::class,
        CityContract::class             =>          CityRepository::class,
        GroupContract::class            =>          GroupRepository::class,
        FacilityContract::class         =>          FacilityRepository::class,
        FarmhouseContract::class        =>          FarmhouseRepository::class,
        UserContract::class             =>          UserRepository::class
       
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
