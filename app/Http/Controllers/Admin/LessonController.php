<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CommonController;
use App\Model\Lesson;
class LessonController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Lesson $lesson)
    {
        $data = $lesson::all();
        return view('admin.lesson.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lesson.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Lesson $lesson)
    {
        $lesson['tital'] = $request['tital'];
        $lesson['introduce'] = $request['introduce'];
        $lesson['preview'] = $request['preview'];
        $lesson['iscommend'] = $request['iscommend'];
        $lesson['ishot'] = $request['ishot'];
        $lesson['click'] = $request['click'];
        $lesson->save();
        return redirect('admin/lesson');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.lesson.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Lesson::find($id);
        return view('admin.lesson.edit',array('data' => $data));
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
        $data = Lesson::find($id);
        $data->tital = $request['tital'];
        $data->introduce = $request['introduce'];
        $data->preview = $request['preview'];
        $data->iscommend = $request['iscommend'];
        $data->ishot = $request['ishot'];
        $data->click = $request['click'];
        $status = $data->save();
        if($status){
            return redirect('admin/lesson');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Lesson::find($id);
//        event(new \App\Events\LessonEvent($model));//调用事件
        if(count($model->videos) > 0){
            session()->flash('success', '改类下面存在视频，请先删除视频~');
        }
        $model->delete();
        $this->success('删除成功');
    }
}
