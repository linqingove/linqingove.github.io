<?php

namespace app\index\controller;

use think\Controller;
use PHPExcel;
use PHPExcel_IOFactory;
/* ThinkPHP万能导出excel表格
项目根目录执行命令：composer require phpoffice/phpexcel
*/

class Index extends Controller
{
    function exportExcel($columName, $list, $setTitle = 'Sheet1', $fileName = 'demo')
    {
        if (empty($columName) || empty($list)) {
            return '列名或者内容不能为空';
        }

        if (count($list[0]) != count($columName)) {
            return '列名跟数据的列不一致';
        }

        //实例化PHPExcel类
        $PHPExcel    =    new PHPExcel();
        //获得当前sheet对象
        $PHPSheet    =    $PHPExcel->getActiveSheet();
        //定义sheet名称
        $PHPSheet->setTitle($setTitle);

        //excel的列 这么多够用了吧？不够自个加 AA AB AC ……
        $letter        =    [
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
            'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
        ];
        //把列名写入第1行 A1 B1 C1 ...
        for ($i = 0; $i < count($list[0]); $i++) {
            //$letter[$i]1 = A1 B1 C1  $letter[$i] = 列1 列2 列3
            $PHPSheet->setCellValue("$letter[$i]1", "$columName[$i]");
        }
        //内容第2行开始
        foreach ($list as $key => $val) {
            //array_values 把一维数组的键转为0 1 2 3 ..
            foreach (array_values($val) as $key2 => $val2) {
                //$letter[$key2].($key+2) = A2 B2 C2 ……
                $PHPSheet->setCellValue($letter[$key2] . ($key + 2), $val2);
            }
        }
        //生成2007版本的xlsx
        $PHPWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');
        $PHPWriter->save("php://output");
    }
    public function test()
    {
        $data = [[1, 2, 3, 4, 5, 6], [1, 2, 3, 4, 5, 6], [1, 2, 3, 4, 5, 6]];
        $titlname    =    ['订单号', '消费用户', '订单金额', '订单数量', '支付状态', '订单时间'];
        $this->exportExcel($titlname, $data, 'Sheet1', 'myexcel');
        echo 1;
    }
}
