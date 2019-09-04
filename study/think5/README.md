<!--
 * @Author: zhangjingguo
 * @Date: 2019-09-04 10:48:43
 * @LastEditTime: 2019-09-04 10:59:15
 * @Description: file content
 -->
# Think 5 发送邮件方法
## 腾讯邮箱实例
### 1、安装：composer require phpmailer/phpmailer
### 2、引入：use PHPMailer\PHPMailer\PHPMailer
### 3、在 application/common.php 文件下写以下代码,在common中查看
### 在Thinkphp5框架中任意地方都可以用以下方式调用：
```php
   sendEmail([['user_email'=>'779670171@qq.com','content'=>'this is TP5 sendmail demo']]);
```
