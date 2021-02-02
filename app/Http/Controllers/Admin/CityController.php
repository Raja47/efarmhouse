<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\CityContract;
use App\Http\Controllers\BaseController;

/**
 * Class CityController
 * @package App\Http\Controllers\Admin
 */
class CityController extends BaseController
{
    /**
     * @var CityContract
     */
    protected $cityRepository;

    /**
     * CityController constructor.
     * @param CityContract $cityRepository
     */
    public function __construct(CityContract $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $cities = $this->cityRepository->listCities();

        $this->setPageTitle('Cities', 'List of all cities');
        return view('admin.cities.index', compact('cities'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $cities = $this->cityRepository->treeList();

        $this->setPageTitle('Cities', 'Create City');
        return view('admin.cities.create', compact('cities'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'      =>  'required|max:191',
            'image'      =>  'mimes:jpg,jpeg,png|max:10000',
            'parent_id'  =>  'required',
            'background' => 'mimes:jpg,jpeg,png|max:30000',
        ]);

        $params = $request->except('_token');

        $city = $this->cityRepository->createCity($params);

        if (!$city) {
            return $this->responseRedirectBack('Error occurred while creating city.', 'error', true, true);
        }
        return $this->responseRedirect('admin.cities.index', 'City added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetCity = $this->cityRepository->findCityById($id);
        $cities = $this->cityRepository->treeList();

        $this->setPageTitle('Cities', 'Edit City : '.$targetCity->name);
        return view('admin.cities.edit', compact('cities', 'targetCity'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title'      =>  'required|max:191',
            'parent_id'  =>  'required',
            'image'     =>  'mimes:jpg,jpeg,png|max:10000',
            'background'     =>  'mimes:jpg,jpeg,png|max:10000'
        ]);

        $params = $request->except('_token');

        $city = $this->cityRepository->updateCity($params);

        if (!$city) {
            return $this->responseRedirectBack('Error occurred while updating city.', 'error', true, true);
        }
        return $this->responseRedirectBack('City updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $city = $this->cityRepository->deleteCity($id);

        if (!$city) {
            return $this->responseRedirectBack('Error occurred while deleting city.', 'error', true, true);
        }
        return $this->responseRedirect('admin.cities.index', 'City deleted successfully' ,'success',false, false);
    }
}
