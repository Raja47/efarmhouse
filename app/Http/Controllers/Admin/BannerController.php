<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\BannerContract;
use App\Http\Controllers\BaseController;

class BannerController extends BaseController
{
    /**
     * @var BannerContract
     */
    protected $bannerRepository;
    
    public function __construct(BannerContract $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    
     /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $banners = $this->bannerRepository->listBanners();

        $this->setPageTitle('Banners', 'List of all Banners');
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('banners', 'Create banner');
        return view('admin.banners.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            //'title'     =>  'required|max:191',
            'banner'    =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $banner = $this->bannerRepository->createBanner($params);



        if ( !$banner ) {
            return $this->responseRedirectBack('Error occurred while creating banner.', 'error', true, true);
        }
        return $this->responseRedirect('admin.banners.index', 'banner added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $banner = $this->bannerRepository->findBannerById($id);

        $this->setPageTitle('banners', 'Edit banner : '.$banner->title);
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            //'title'      =>  'required|max:191',
            'banner'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $banner = $this->bannerRepository->updateBanner($params);



        if (!$banner) {
            return $this->responseRedirectBack('Error occurred while updating banner.', 'error', true, true);
        }
        return $this->responseRedirectBack('banner updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $banner = $this->bannerRepository->deletebanner($id);

        if (!$banner) {
            return $this->responseRedirectBack('Error occurred while deleting banner.', 'error', true, true);
        }
        return $this->responseRedirect('admin.banners.index', 'banner deleted successfully' ,'success',false, false);
    }


}
