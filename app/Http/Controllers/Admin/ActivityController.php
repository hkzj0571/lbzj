<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repository\ActivityRepository;
use App\Tools\Tools;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{

    public function __construct(ActivityRepository $activityRepository)
    {
        $this->activityRepository = $activityRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $activitys= $this->activityRepository->selectAll();

            return view('admin.activity.index', compact('activitys'));

        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'error');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            /** 获取资源 */


            $activitypreview = Tools::fileMove($request, 'preview', 'activity-preview');

            if (!$activitypreview) {
                throw new \Exception('活动图片上传失败,请重试');
            }

            Tools::tailoringImages($activitypreview->filePath,740,448);

            $imagePath = Tools::uploadQiniu($activitypreview->filePath,time().$activitypreview->fileName,'activity-preview');

            $activity = $this->activityRepository->create([
                'preview' =>$imagePath,
                'name' => $request->get('name'),
                'intro' => $request->get('intro'),
                'acdate' => $request->get('acdate'),

            ]);

            if (!$activity) {
                throw new \Exception('创建失败,服务器内部错误,请重试');
            }

            return Tools::notifyTo("成功添加了活动 [{$activity->name}]");

        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'danger');
        }
    }


    public function edit(Request $request,$id)
    {
        try {
            /** 获取资源 */
            $data = $request->all();

//            dd($data);

            $activitypreview = Tools::fileMove($request, 'preview', 'activity-preview');

            if ($activitypreview) {

                Tools::tailoringImages($activitypreview->filePath,740,448);
                $imagePath = Tools::uploadQiniu($activitypreview->filePath,time().$activitypreview->fileName,'activity-preview');
//                $imagePath = '/' . $activitypreview->filePath;

                if (!$imagePath) {
                    throw new \Exception('图片上传失败');
                }

                $data['preview'] = $imagePath;
            }

            unset($data['_token']);

            $activity = $this->activityRepository->update($id,$data);




            if (!$activity) {
                throw new \Exception('修改失败,服务器内部错误,请重试');
            }

            return Tools::notifyTo("修改成功了活动 ");


        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'danger');
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
        $this->activityRepository->destroy($id);
        return Tools::notifyTo('删除成功');
    }
}
