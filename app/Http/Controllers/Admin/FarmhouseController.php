<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\CityContract;
use App\Contracts\GroupContract;
use App\Contracts\CategoryContract;
use App\Contracts\FarmhouseContract;
use App\Http\Controllers\BaseController;
use App\Http\Requests\StoreFarmhouseFormRequest;


class FarmhouseController extends BaseController
{
    protected $cityRepository;

    protected $categoryRepository;

    protected $farmhouseRepository;

    public function __construct( CityContract $cityRepository , CategoryContract $categoryRepository , FarmhouseContract $farmhouseRepository, GroupContract $groupRepository)
    {
        $this->cityRepository = $cityRepository;
        $this->categoryRepository = $categoryRepository;
        $this->farmhouseRepository = $farmhouseRepository;
        $this->groupRepository = $groupRepository;
    }

    public function index()
    {
        $farmhouses = $this->farmhouseRepository->listFarmhouses('id', 'desc');
        $this->setPageTitle('Farmhouses', 'Farmhouses List');
        return view('admin.farmhouses.index', compact('farmhouses'));
    }

    public function create()
    {
        $cities = $this->cityRepository->listCities('title', 'asc');
        $categories = $this->categoryRepository->listCategories('title', 'asc');
        $groups = $this->groupRepository->listGroups('title', 'asc');
        $this->setPageTitle('Farmhouses', 'Create Farmhouse');
        return view('admin.farmhouses.create', compact('categories', 'cities','groups'));
    }

    public function store(Request $request)
    {   
        $this->validate($request, [
            'title'         =>  'required|max:191',
            'sku'           =>  'required',
            'categories'    =>  'required',
            'city_id'       =>  'required|not_in:0',
            'price'         =>  'required|regex:/^\d+(\.\d{1,2})?$/',
            'sale_price'    =>  'regex:/^\d+(\.\d{1,2})?$/|nullable',
            'featuredImage' =>  'mimes:jpg,jpeg,png|max:10000|nullable',
            'bannerImage'   =>  'mimes:jpg,jpeg,png|max:30000|nullable'
        ]);

        $params = $request->except('_token');
        $farmhouse = $this->farmhouseRepository->createFarmhouse($params);
        if (!$farmhouse) {
            return $this->responseRedirectBack('Error occurred while creating farmhouse.', 'error', true, true);
        }
        
        return redirect()->route('admin.farmhouses.edit' , ['id' => $farmhouse->id]);
    }

    public function edit($id)
    {
        $farmhouse  = $this->farmhouseRepository->findFarmhouseById($id);
        $cities     = $this->cityRepository->listCities('title', 'asc');
        $categories = $this->categoryRepository->listCategories('title', 'asc');
        $groups = $this->groupRepository->listGroups('title', 'asc');
        $this->setPageTitle('Farmhouses', 'Edit Farmhouse');

        return view('admin.farmhouses.edit', compact( 'categories' , 'cities' , 'groups' , 'farmhouse' ));
    }

    public function update(Request $request)
    {
        $params = $request->except('_token');
         $this->validate($request, [
            'title'         => 'required|max:255',
            'sku'           => 'required',
            'categories'    => 'required',
            'city_id'       => 'required|not_in:0',
            'price'         => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'sale_price'    => 'regex:/^\d+(\.\d{1,2})?$/|nullable',
            'featuredImage' => 'mimes:jpg,jpeg,png|max:10000|nullable',
            'bannerImage'   => 'mimes:jpg,jpeg,png|max:30000|nullable'
        ]);

        $farmhouse = $this->farmhouseRepository->updateFarmhouse($params);

        if (!$farmhouse) {
            return $this->responseRedirectBack('Error occurred while updating farmhouse.', 'error', true, true);
        }
        return $this->responseRedirect( 'admin.farmhouses.index' , 'Farmhouse updated successfully' ,'success',false, false);
    }
    
    public function delete($id){
        
       $farmhouse= $this->farmhouseRepository->deleteFarmhouse($id);
        if( !$farmhouse ){
            return $this->responseRedirectBack('Error occurred while deleting farmhouse.', 'error', true, true);
        }
        return $this->responseRedirect('admin.farmhouses.index', 'Farmhouse deleted successfully' ,'success',false, false);
    }

    public function uploadGalleryImages(Request $request){
        
        $params = $request->except('_token');
        $uploaded = $this->farmhouseRepository->uploadGalleryImages($params);
        
        if (!$uploaded) {
            return $this->responseRedirectBack('Error occurred while updating farmhouse.', 'error', true, true);
        }

        return $this->responseRedirect( 'admin.farmhouses.index' , 'Farmhouse updated successfully' ,'success',false, false);
    }

    public function deleteGalleryImage($farmhouseId ,$mediaId ){

        $farmhouse  = $this->farmhouseRepository->findFarmhouseById($farmhouseId);
        $medias = $farmhouse->getMedia('gallery');
        $deleted = $medias[$mediaId]->delete();        
    
        if (!$deleted) {
            return $this->responseRedirectBack('Error occurred while Deleting Image', 'error', true, true);
        }

        return $this->responseRedirect( 'admin.farmhouses.index' , 'Farmhouse updated successfully' ,'success',false, false);
    }
}
