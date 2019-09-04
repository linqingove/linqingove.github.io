<?php
use PHPMailer\PHPMailer\PHPMailer; //引用命名空间的mailer插件,使用composer 在项目中下载即可

function sendEmail($data = []) {

    Vendor('phpmailer.phpmailer');
    $mail = new PHPMailer(); //实例化
  
    $mail->IsSMTP(); // 启用SMTP
    $mail->Host = 'smtp.qq.com'; //SMTP服务器 以126邮箱为例子 
    $mail->Port = 465;  //邮件发送端口
    $mail->SMTPAuth = true;  //启用SMTP认证
    $mail->SMTPSecure = "ssl";   // 设置安全验证方式为ssl
  
    $mail->CharSet = "UTF-8"; //字符集
    $mail->Encoding = "base64"; //编码方式
  
    $mail->Username = '779670171@qq.com';  //你的邮箱 
    $mail->Password = 'vudtlspwrylpbfga';  //你的邮箱授权码
    $mail->Subject = 'SMTP测试'; //邮件标题  
  
    $mail->From = '779670171@qq.com';  //发件人地址（也就是你的邮箱）
    $mail->FromName = '张经国';  //发件人姓名
  
    if($data && is_array($data)){
      foreach ($data as $k=>$v){
        $mail->AddAddress($v['user_email'], "亲"); //添加收件人（地址，昵称）
        $mail->IsHTML(true); //支持html格式内容
        $mail->Body = $v['content']; //邮件主体内容
  
        //发送成功就删除
        if ($mail->Send()) {
          echo "发送成功";
        }else{
            echo "Mailer Error: ".$mail->ErrorInfo;// 输出错误信息  
        }
      }
    }           
  }