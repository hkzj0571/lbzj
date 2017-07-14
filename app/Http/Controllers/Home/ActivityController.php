<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Repository\MemberRepository;
use App\Repository\ActivityRepository;
use App\Tools\Tools;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
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

            $activitys = $this->activityRepository->paginate(6);

            return view('home.activity.index',compact('activitys'));

        } catch (\Exception $exception){
            return Tools::notifyTo($exception->getMessage(), 'danger');
        }


    }


    public function show($id)
    {
        try {

            $activitys = $this->activityRepository->find($id);

//         dd($activitys);
            return view('home.activity.show',compact('activitys'));

        } catch (\Exception $exception){
            return Tools::notifyTo($exception->getMessage(), 'danger');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createmember(Request $request)
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

            return Tools::notifyTo("恭喜您报名成功!");

        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'danger');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
