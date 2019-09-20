<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;

// Route::any('/:user_name/:user_pwd','Index/index');
Route::any('/','Index/index');
Route::any('/index2','Index/index2');
Route::any('/index3','Index/index3');
Route::any('/index4','Index/index4');
Route::any('/email','Index/email');
Route::any('/cookie1','Index/cookie1');
Route::any('/cookie2','Index/cookie2');
Route::any('/test','admin/Index/test');
Route::any('/test2','admin/Index/test2');
