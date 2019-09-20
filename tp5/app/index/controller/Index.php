<?php

namespace app\index\controller;

use think\Controller;
use think\Db;

/**
 * @description:
 * @param {type}
 * @return:
 */
class Index extends Controller
{
    public function index()
    {
        //初始化
        $curl = curl_init();
        //设置抓取的url
        curl_setopt($curl, CURLOPT_URL, 'http://apis.juhe.cn/ip/ipNew');
        //设置头文件的信息作为数据流输出1,0不输出
        curl_setopt($curl, CURLOPT_HEADER, 0);
        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //设置post方式提交
        curl_setopt($curl, CURLOPT_POST, 1);
        //设置post数据
        $post_data = array(
            "ip"  => "112.112.11.11",
            "key" => "c23ba8d8abab364449e8465230fdef35",
        );
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
        //执行命令
        $data = curl_exec($curl);
        //关闭URL请求
        curl_close($curl);
        //显示获得的数据
        echo ($data);
    }
    public function index2()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL            => "http://apis.juhe.cn/ip/ipNew",
            //将curl_exec()获取的信息以文件流的形式返回，而不是直接输出。
            CURLOPT_RETURNTRANSFER => true,

            CURLOPT_ENCODING       => "",

            CURLOPT_MAXREDIRS      => 10,

            CURLOPT_TIMEOUT        => 30,

            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_NONE,

            CURLOPT_CUSTOMREQUEST  => "POST",

            CURLOPT_POSTFIELDS     => "-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"ip\"\r\n\r\n112.112.11.11\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"key\"\r\n\r\nc23ba8d8abab364449e8465230fdef35\r\n-----011000010111000001101001--",

            CURLOPT_HTTPHEADER     => array(
                "cache-control: no-cache",
                "content-type: multipart/form-data; boundary=---011000010111000001101001",
            ),
        ));

        $response = curl_exec($curl);
        $err      = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    public function index3()
    {
        //parse_str与http_build_query的使用

        //使用parse_str将url字符串转变为key=>value的数组
        $str = "tn=monline_dg&ie=utf-8&bs=httpbuildurl&f=3&rsv_bp=1&wd=php+buildquery&rsv_sug3=17&rsv_sug4=330&rsv_sug1=16&oq=php+build&rsv_sug2=0&rsp=0&inputT=8922";
        parse_str($str, $arr);
        var_export($arr);

        $url = http_build_query($arr);
        var_dump($url);
    }
    public function index4()
    {
        $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
        echo json_encode($arr);



        // $a1 = Db::table('user')->where('id', 1)->find();
        // var_dump($a1);
    }
    public function email()
    {
        //发email测试
        sendEmail([['user_email' => '779670171@qq.com', 'content' => 'phpmailer']]);
    }
    public function cookie1()
    {
        setcookie("name", "value");
        header("Location:cookie2");
    }
    public function cookie2()
    {
        $to = "779670171@qq.com";         // 邮件接收者
        $subject = "参数邮件";                // 邮件标题
        $message = "Hello! 这是邮件的内容。";  // 邮件正文
        $from = "779670171@qq.com";   // 邮件发送者
        $headers = "From:" . $from;         // 头部信息设置
        mail($to, $subject, $message, $headers);
        echo "邮件已发送";
    }
}
