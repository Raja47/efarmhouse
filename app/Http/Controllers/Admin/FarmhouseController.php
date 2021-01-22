<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\CityContract;
use App\Contracts\CategoryContract;
use App\Contracts\FarmhouseContract;
use App\Http\Controllers\BaseController;
use App\Http\Requests\StoreFarmhouseFormRequest;


class FarmhouseController extends BaseController
{
    protected $cityRepository;

    protected $categoryRepository;

    protected $farmhouseRepository;

    public function __construct(
        CityContract $cityRepository,
        CategoryContract $categoryRepository,
        FarmhouseContract $farmhouseRepository
    )
    {
        $this->cityRepository = $cityRepository;
        $this->categoryRepository = $categoryRepository;
        $this->farmhouseRepository = $farmhouseRepository;
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

        $this->setPageTitle('Farmhouses', 'Create Farmhouse');
        return view('admin.farmhouses.create', compact('categories', 'cities'));
    }

    public function store(StoreFarmhouseFormRequest $request)
    {
        $params = $request->except('_token');

        $farmhouse = $this->farmhouseRepository->createFarmhouse($params);

        if (!$farmhouse) {
            return $this->responseRedirectBack('Error occurred while creating farmhouse.', 'error', true, true);
        }
        return redirect()->route('admin.farmhouses.edit' , ['id' => $farmhouse->id]);
    }

    public function edit($id)
    {
        $farmhouse    = $this->farmhouseRepository->findFarmhouseById($id);
        $cities     = $this->cityRepository->listCities('title', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');

        $this->setPageTitle('Farmhouses', 'Edit Farmhouse');
        return view('admin.farmhouses.edit', compact('categories', 'cities', 'farmhouse'));
    }

    public function update(StoreFarmhouseFormRequest $request)
    {
        $params = $request->except('_token');

        $farmhouse = $this->farmhouseRepository->updateFarmhouse($params);

        if (!$farmhouse) {
            return $this->responseRedirectBack('Error occurred while updating farmhouse.', 'error', true, true);
        }
        return $this->responseRedirect( 'admin.farmhouses.index' , 'Farmhouse updated successfully' ,'success',false, false);
    }
    
    public function delete($id){
        
       $farmhouse= $this->farmhouseRepository->deleteFarmhouse($id);
       
        if (!$farmhouse) {
            return $this->responseRedirectBack('Error occurred while deleting farmhouse.', 'error', true, true);
        }
        return $this->responseRedirect('admin.farmhouses.index', 'Farmhouse deleted successfully' ,'success',false, false);
    }
}
