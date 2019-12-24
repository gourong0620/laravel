<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\TagRequest;
use App\Model\Tag;
use App\Http\Controllers\Admin\CommonController;
/*
 * 执行php artisan make:controller Admin/TagController --resource
 * 创建资源控制器
 */
class TagController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tag::get();
        //将数据发送到视图的两种方法
        return view('admin.tag.index',compact('data'));
//        return view('admin.tag.index',array('data' => $data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * 保存数据
     * Store a newly created resource in storage.
     * 需要验证数据
     * 执行 php artisan make:request TagRequest 生成/app/Http/Requests/TagRequest.php验证文件
     * 将TagRequest注入会进行自动验证
     * 将TagModel进行注入
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request,Tag $model)
    {
        $model->create($request->all());
        return redirect('admin/tag');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Tag::find($id);
//        return view('admin.tag.edit',compact('model'));
        return view('admin.tag.edit',array('model' => $model));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Tag::find($id);
        return view('admin.tag.edit',array('model' => $model));
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
        $model = Tag::find($id);
        $model->name = $request['name'];
        $status = $model->save();
        if($status){
            return redirect('admin/tag');
        }else{
            return redirect('admin/tag');
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
        Tag::destroy($id);
        $this->success('删除成功');
    }
}
