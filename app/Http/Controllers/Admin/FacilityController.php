<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\FacilityContract;
use App\Http\Controllers\BaseController;

/**
 * Class FacilityController
 * @package App\Http\Controllers\Admin
 */
class FacilityController extends BaseController
{
    /**
     * @var FacilityContract
     */
    protected $facilityRepository;

    /**
     * FacilityController constructor.
     * @param FacilityContract $facilityRepository
     */
    public function __construct(FacilityContract $facilityRepository)
    {
        $this->facilityRepository = $facilityRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $facilities = $this->facilityRepository->listFacilities();

        $this->setPageTitle('Facilities', 'List of all facilities');
        return view('admin.facilities.index', compact('facilities'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $facilities = $this->facilityRepository->listFacilities();

        $this->setPageTitle('Facilities', 'Create Facility');
        return view('admin.facilities.create', compact('facilities'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'      =>  'required|max:191' ,
            'image'      =>  'mimes:jpg,jpeg,png|max:10000',            
        ]);

        $params = $request->except('_token');

        $facility = $this->facilityRepository->createFacility($params);

        if (!$facility) {
            return $this->responseRedirectBack('Error occurred while creating facility.', 'error', true, true);
        }
        return $this->responseRedirect('admin.facilities.index', 'Facility added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetFacility = $this->facilityRepository->findFacilityById($id);
        $facilities = $this->facilityRepository->listFacilities();

        $this->setPageTitle('Facilities', 'Edit Facility : '.$targetFacility->name);
        return view('admin.facilities.edit', compact('facilities', 'targetFacility'));
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
            'image'     =>  'mimes:jpg,jpeg,png|max:10000',
        ]);

        $params = $request->except('_token');

        $facility = $this->facilityRepository->updateFacility($params);

        if (!$facility) {
            return $this->responseRedirectBack('Error occurred while updating facility.', 'error', true, true);
        }
        return $this->responseRedirectBack('Facility updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $facility = $this->facilityRepository->deleteFacility($id);

        if (!$facility) {
            return $this->responseRedirectBack('Error occurred while deleting facility.', 'error', true, true);
        }
        return $this->responseRedirect('admin.facilities.index', 'Facility deleted successfully' ,'success',false, false);
    }
}
