<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
class alipayController extends Controller
{

    public function Alipay(){
        $alipay = app('alipay.web');
        $alipay->setOutTradeNo('E0002332039');
        $alipay->setTotalFee('0.01');
        $alipay->setSubject('小米5s');
        $alipay->setBody('商品：支付宝支付测试');

        $alipay->setQrPayMode('5'); //该设置为可选1-5，添加该参数设置，支持二维码支付。

        // 跳转到支付页面。
        return redirect()->to($alipay->getPayLink());
    }

//    public function alipay()
//    {
//        $orderId = time();
//        $orderPrice = 0.01;
//        $goodsName = '外星人笔记本电脑';
//        $goodsDescription = '外星人笔记本电脑';
//        // 创建支付单。
//        $alipay = app('alipay.web');
//        $alipay->setOutTradeNo($orderId);
//        $alipay->setTotalFee($orderPrice);
//        $alipay->setSubject($goodsName);
//        $alipay->setBody($goodsDescription);
//        // 跳转到支付页面。
//        return redirect()->to($alipay->getPayLink());
//    }


// 异步通知支付结果
    public function AliPayNotify(Request $request){
// 验证请求。
        if (!app('alipay.web')->verify()) {
            Log::notice('Alipay notify post data verification fail.', [
                'data' => $request->instance()->getContent()
            ]);
            return 'fail';
        }
// 判断通知类型。
        switch ($request ->input('trade_status','')) {
            case 'TRADE_SUCCESS':
            case 'TRADE_FINISHED':
                // TODO: 支付成功，取得订单号进行其它相关操作。
                Log::debug('Alipay notify post data verification success.', [
                    'out_trade_no' => $request -> input('out_trade_no',''),
                    'trade_no' => $request -> input('trade_no','')
                ]);
                break;
        }
        return 'success';
    }

// 同步通知支付结果
    public function AliPayReturn(Request $request){
// 验证请求。
        if (!app('alipay.web')->verify()) {
            Log::notice('支付宝返回查询数据验证失败。', [
                'data' => $request->getQueryString()
            ]);
            return view('alipayfail');
        }
// 判断通知类型。
        switch ($request ->input('trade_status','')) {
            case 'TRADE_SUCCESS':
            case 'TRADE_FINISHED':
                // TODO: 支付成功，取得订单号进行其它相关操作。
                Log::debug('支付宝通知获得数据验证成功。', [
                    'out_trade_no' => $request ->input('out_trade_no',''),
                    'trade_no' => $request -> input('trade_no','')
                ]);
                break;
        }
        return view('alipaysuccess');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
}
