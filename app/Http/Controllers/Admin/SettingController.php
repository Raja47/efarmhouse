<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\BaseController;

/**
 * Class SettingController
 * @package App\Http\Controllers\Admin
 */
class SettingController extends BaseController
{
    use UploadAble;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->setPageTitle('Settings', 'Manage Settings');
        return view('admin.settings.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        if ($request->has('site_logo') && ($request->file('site_logo') instanceof UploadedFile)) {

            if (config('settings.site_logo') != null) {
                $this->deleteOne(config('settings.site_logo'));
            }
            $logo = $this->uploadOne($request->file('site_logo'), 'img');
            Setting::set('site_logo', $logo);

        } elseif($request->has('site_favicon') && ($request->file('site_favicon') instanceof UploadedFile)) {

            if (config('settings.site_favicon') != null) {
                $this->deleteOne(config('settings.site_favicon'));
            }
            $favicon = $this->uploadOne($request->file('site_favicon'), 'img');
            Setting::set('site_favicon', $favicon);

        }    elseif($request->has('site_popup') && ($request->file('site_popup') instanceof UploadedFile)) {
        
            if (config('settings.site_popup') != null) {
                $this->deleteOne(config('settings.site_fpopup'));
            }
            $favicon = $this->uploadOne($request->file('site_popup'), 'img');
            Setting::set('site_popup', $favicon);

        } 
         elseif($request->has('watermark_image') && ($request->file('watermark_image') instanceof UploadedFile)) {
        
            if (config('settings.watermark_image') != null) {
                $this->deleteOne(config('settings.watermark_image'));
            }
            $favicon = $this->uploadOne($request->file('watermark_image'), 'img');
            Setting::set('watermark_image', $favicon);

        } 
        else {

            $keys = $request->except('_token');

            foreach ($keys as $key => $value)
            {
                Setting::set($key, $value);
            }
        }
        
        return $this->responseRedirectBack('Settings updated successfully.', 'success');
    }
}
