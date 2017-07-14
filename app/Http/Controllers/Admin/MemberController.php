<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repository\ActivityRepository;

use App\Repository\MemberRepository;
use App\Tools\Tools;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function __construct(ActivityRepository $activityRepository,MemberRepository $memberRepository)
    {
        $this->activityRepository = $activityRepository;
        $this->memberRepository = $memberRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $members= $this->memberRepository->selectAll();

            $activitys = $this->activityRepository->selectAll();

            return view('admin.member.index', compact('members','activitys'));

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

            $phone = $request->get('phone');

            /** 判断长度 */
            if (strlen($phone)  != 11 ) {
                throw new \Exception('手机号码格式不正确');
            }

            $activity = $this->memberRepository->create([
                'name' => $request->get('name'),
                'phone' => $request->get('phone'),
                'wechat' => $request->get('wechat'),
                'activity_id' => $request->get('activity_id'),

            ]);

            if (!$activity) {
                throw new \Exception('创建失败,服务器内部错误,请重试');
            }

            return Tools::notifyTo("添加成员 [{$activity->name}]成功!");

        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'danger');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        try {
            $data = $request->all();

            unset($data['_token']);

            $members = $this->memberRepository->update($id,$data);

            if (!$members) {
                throw new \Exception('修改失败,服务器内部错误,请重试');
            }

            return Tools::notifyTo("成功修改 成员参加的活动 ");


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
        $this->memberRepository->destroy($id);
        return Tools::notifyTo('删除成功');
    }
}
