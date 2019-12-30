<?php

namespace App\Http\Controllers\Admin;

use App\Model\Lesson;
use App\Model\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\CommonController;
use App\Http\Controllers\Component\UploadController;
use Illuminate\Support\Facades\Storage;

class VideoController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Video $video)
    {
        $data = $video::all();
        return view('admin.video.index',array('data' => $data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Lesson $lesson)
    {
        $data = $lesson::all();
        return view('admin.video.create',array('data' => $data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Video $video)
    {
        $uploader = new UploadController();
        $res = $uploader->uploader($request);
        $path = $res['message'];
        $video->path = $path;
        $video->title = $request['title'];
        $video->lesson_id = $request['lesson_id'];
        if($video->save()){
            return redirect('admin/video');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Video::find($id);
        $res = Lesson::all();
        return view('admin.video.edit',array('data' => $data,'res' => $res));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Video::find($id);
        $uploader = new UploadController();
        $res = $uploader->uploader($request);
        $path = $res['message'];
        $file_url = $model->path;
        $model->path = $path;
        $model->title = $request['title'];
        $model->lesson_id = $request['lesson_id'];
        if($model->save()){
            //移除原来的视频文件
            $url = $this->getFileName($file_url);
            @unlink(PUBLIC_URL.$url);
            return redirect('admin/video');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Video::find($id);
        $model->delete();
        $file_url = $model->path;
        $url = $this->getFileName($file_url);
        @unlink(PUBLIC_URL.$url);
        return redirect('admin/video');
    }
}
