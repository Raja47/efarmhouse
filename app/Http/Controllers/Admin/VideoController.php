<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class VideoController extends BaseController
{
    /**
     * @var BannerContract
     */
   
     /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->setPageTitle('Videos', 'List of Videos');
        $videos = Video::all();
        return view( 'admin.videos.index' , compact('videos') );
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('banners', 'Add Video');
        return view('admin.videos.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'video'    =>  'required|string|max:191'
        ]);
        
        $status = $request->status == 'on' ? 1 : 0;
       
        $video = new Video;
        
        $video->video = $request->video;
        $video->status = $status;


        if ( ! $video->save() ) {
            return $this->responseRedirectBack('Error occurred while creating Video.', 'error', true, true);
        }
        return $this->responseRedirect('admin.videos.index', 'Video added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
   
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        
        $deleted  = Video::find($id)->delete($id);
       
    if (!$deleted) {
            return $this->responseRedirectBack('Error occurred while deleting banner.', 'error', true, true);
        }
        return $this->responseRedirect('admin.videos.index', 'Video deleted successfully' ,'success',false, false);
    }


}
