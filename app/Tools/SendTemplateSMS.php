<?php
/*
 *  Copyright (c) 2014 The CCP project authors. All Rights Reserved.
 *
 *  Use of this source code is governed by a Beijing Speedtong Information Technology Co.,Ltd license
 *  that can be found in the LICENSE file in the root of the web site.
 *
 *   http://www.yuntongxun.com
 *
 *  An additional intellectual property rights grant can be found
 *  in the file PATENTS.  All contributing project authors may
 *  be found in the AUTHORS file in the root of the source tree.
 */
namespace App\Tools;


class SendTemplateSMS
{
    //主帐号
    private $AccountSid = '8aaf07085c62aa66015c780762880646';

    //主帐号Token
    private $AccountToken = 'c0138c61dfe5424ebb1924b106217ed5';

    //应用Id
    private $AppId = '8aaf07085c62aa66015c785386730662';

    //请求地址，格式如下，不需要写https://
    private $ServerIP='sandboxapp.cloopen.com';

    //请求端口
    private $ServerPort = '8883';

    //REST版本号
    private $SoftVersion = '2013-12-26';


    /**
     * 发送模板短信
     * @param to 手机号码集合,用英文逗号分开
     * @param datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
     * @param $tempId 模板Id
     */
    function sendTemplateSMS($to, $datas, $tempId)
    {
        // 初始化REST SDK
        global $AccountSid, $AccountToken, $AppId, $ServerIP, $ServerPort, $SoftVersion;
        $rest = new CCPRestSDK($this->ServerIP,$this->ServerPort,$this->SoftVersion);
        $rest->setAccount($this->AccountSid, $this->AccountToken);
        $rest->setAppId($this->AppId);

        // 发送模板短信
        echo "Sending TemplateSMS to $to <br/>";
        $result = $rest->sendTemplateSMS($to, $datas, $tempId);
        if ($result == NULL) {
            echo "result error!";

        }
        if ($result->statusCode != 0) {
            echo "error code :" . $result->statusCode . "<br>";
            echo "error msg :" . $result->statusMsg . "<br>";
            //TODO 添加错误处理逻辑
        } else {
            echo "Sendind TemplateSMS success!<br/>";
            // 获取返回信息
            $smsmessage = $result->TemplateSMS;
            echo "dateCreated:" . $smsmessage->dateCreated . "<br/>";
            echo "smsMessageSid:" . $smsmessage->smsMessageSid . "<br/>";
            //TODO 添加成功处理逻辑
        }
    }
}
//Demo调用,参数填入正确后，放开注释可以调用 
//sendTemplateSMS("手机号码","内容数据","模板Id");
?>
