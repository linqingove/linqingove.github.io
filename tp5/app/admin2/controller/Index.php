<?php
namespace app\admin2\controller;
// 引入系统数据类
use think\Controller;
class Index extends Controller
{
    public function index()
    {
        return view();
    }
    public function User()
    {
        return 'this is admin/index/User()';
    }
    public function test()
    {
        return "this is index.php/ admin /index /test1";
    }
    public function test2()
    {
        return "this is index.php/ admin /index /test2";
    }
}
