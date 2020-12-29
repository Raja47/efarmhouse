<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\CategoryBannerContract;
use App\Http\Controllers\BaseController;
use App\Models\Category;

class CategoryBannerController extends BaseController
{
    /**
     * @var BannerContract
     */
    protected $categoryBannerRepository;
    
    public function __construct(CategoryBannerContract $categoryBannerRepository)
    {
        $this->categoryBannerRepository = $categoryBannerRepository;
    }

    
     /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $banners = $this->categoryBannerRepository->listBanners('category_id');
        $this->setPageTitle('Category Banners', 'List of all Banners');
        return view('admin.category_banners.index', compact('banners'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('Category Banners', 'Create Category Banner');
        $categories = Category::all();

        return view('admin.category_banners.create')->with('categories',$categories);
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
            'category_id' => 'required',
            'banner'    =>  'mimes:jpg,jpeg,png,webp|max:1000'
        ]);



        $params = $request->except('_token');

        $banner = $this->categoryBannerRepository->createBanner($params);



        if ( !$banner ) {
            return $this->responseRedirectBack('Error occurred while creating banner.', 'error', true, true);
        }
        return $this->responseRedirect('admin.category.banners.index', 'banner added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $banner = $this->categoryBannerRepository->findBannerById($id);
        $categories = Category::all();
        $this->setPageTitle('Category Banners', 'Edit Category banner : '.$banner->title);
        return view('admin.category_banners.edit', compact('banner'))->with('categories',$categories);
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

        $banner = $this->categoryBannerRepository->updateBanner($params);



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
        $banner = $this->categoryBannerRepository->deletebanner($id);

        if (!$banner) {
            return $this->responseRedirectBack('Error occurred while deleting banner.', 'error', true, true);
        }
        return $this->responseRedirect('admin.category.banners.index', 'banner deleted successfully' ,'success',false, false);
    }


}
