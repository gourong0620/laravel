<?php

namespace App\Http\Controllers\Component;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    /**
     * 上传图片方法
     *
     * @param  Request  $request
     * @return Response
     */
    public function uploader(Request $request)
    {
        $file = $request->file;
        if($file->isValid()){
            $path = $file->store(date('ym'),'attachment');
//            $name = $file->extension();获取文件后缀
            return array('valid' => 1,'message' => asset('attachment/'.$path));
        }
        return array('valid' => 0,'message' => '文件上传失败');
    }

    /*
     * 上传图片列表
     */
    public function filesLists()
    {
        return array('data' => array(),'page' => '');
    }
}
