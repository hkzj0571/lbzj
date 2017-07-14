<?php

namespace App\Http\Controllers\Admin;

use App\Tools\Tools;
use Illuminate\Http\Request;
use App\Tools\SendTemplateSMS;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        try {

            /** Get 方式 抛出View */
            if ($request->isMethod('get')) {
                return view('admin.index.login');
            }

            /** 登录 */
            if (Auth::attempt([
                    'email' => $request->get('email'),
                    'password' => $request->get('password'),
                    'enable' => 1]
            ))
            {

                $adminName = Auth::user()->name;
                return Tools::notifyTo("欢迎登陆 ~ [{$adminName}]", 'info', '/admin/index');
            }


            return Tools::notifyTo(
                "登录失败,此账号被停用或账号错误,你还有次登录机会~",
                'error'
            );

        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'error');
        }

    }


    public function index()
    {
        return view('admin.index.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function SendSMS()
    {
        $sendTemplateSMS = new SendTemplateSMS;

        $code = '';

        $charset = '1234567890';

        $len = strlen($charset) -1;

        for($i = 0 ; $i < 6; ++$i){
            $code .=$charset[mt_rand(0,$len)];
        }

        $sendTemplateSMS->sendTemplateSMS("13735526579",array($code,60),1);


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
    public function logout()
    {
        try {
            Auth::logout();
            return Tools::notifyTo('你已经安全退出', 'info', '/admin');
        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'error');
        }
    }
}
