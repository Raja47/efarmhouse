<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\GroupContract;
use App\Http\Controllers\BaseController;

/**
 * Class GroupController
 * @package App\Http\Controllers\Admin
 */
class GroupController extends BaseController
{
    /**
     * @var GroupContract
     */
    protected $groupRepository;

    /**
     * GroupController constructor.
     * @param GroupContract $groupRepository
     */
    public function __construct(GroupContract $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $groups = $this->groupRepository->listGroups();

        $this->setPageTitle('Groups', 'List of all groups');
        return view('admin.groups.index', compact('groups'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $groups = $this->groupRepository->listGroups();

        $this->setPageTitle('Groups', 'Create Group');
        return view('admin.groups.create', compact('groups'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'title'      =>  'required|max:255',
            'sku'       =>    'required',
            //'weight'    =>  'required|regex:/^\d+(\.\d{1,2})?$/',
            'city_id'  =>   'required|not_in:0',
            'price'     =>  'required|regex:/^\d+(\.\d{1,2})?$/',
            'sale_price'=>  'regex:/^\d+(\.\d{1,2})?$/|nullable',
            'featuredImage' => 'mimes:jpg,jpeg,png|max:10000|nullable',
            'bannerImage'   => 'mimes:jpg,jpeg,png|max:30000|nullable'
        ]);

        $params = $request->except('_token');

        $group = $this->groupRepository->createGroup($params);

        if (!$group) {
            return $this->responseRedirectBack('Error occurred while creating group.', 'error', true, true);
        }
        return $this->responseRedirect('admin.groups.index', 'Group added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetGroup = $this->groupRepository->findGroupById($id);
        $groups = $this->groupRepository->listGroups();

        $this->setPageTitle('Groups', 'Edit Group : '.$targetGroup->name);
        return view('admin.groups.edit', compact('groups', 'targetGroup'));
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
            'background'     =>  'mimes:jpg,jpeg,png|max:10000'
        ]);

        $params = $request->except('_token');

        $group = $this->groupRepository->updateGroup($params);

        if (!$group) {
            return $this->responseRedirectBack('Error occurred while updating group.', 'error', true, true);
        }
        return $this->responseRedirectBack('Group updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $group = $this->groupRepository->deleteGroup($id);

        if (!$group) {
            return $this->responseRedirectBack('Error occurred while deleting group.', 'error', true, true);
        }
        return $this->responseRedirect('admin.groups.index', 'Group deleted successfully' ,'success',false, false);
    }
}
