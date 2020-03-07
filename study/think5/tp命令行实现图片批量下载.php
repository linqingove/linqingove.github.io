<?php

namespace app\home\command;

use think\console\Command;
use think\console\Input;
use think\console\Output;
use think\Db;

class Test extends Command
{
    protected function configure()
    {
        $this->setName('test')->setDescription('Here is the remark ');
    }
    public function download($url, $path)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        $file = curl_exec($ch);
        curl_close($ch);
        $filename = pathinfo($url, PATHINFO_BASENAME);
        $resource = fopen($path . $filename, 'a');
        fwrite($resource, $file);
        fclose($resource);
    }
    public function index()
    {
        
    }
    protected function execute(Input $input, Output $output)
    {
        $images  = Db::table('jm_good_img')->join('jm_good b', 'jm_good_img.good_id = b.id')->where('jm_good_img.is_del=0')->field('DISTINCT(jm_good_img.good_id),b.good_code,jm_good_img.img_url')->order('jm_good_img.good_id')->limit(20001,10000)->select();
        // var_dump($images);die;
        // $i=0;
        foreach ($images as $key => $value) {
            // $i++;
            $dir = iconv("UTF-8", "GBK", "D:/images/" . $value['good_code']);
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $res[$key]['img_url'] = 'http://img.yaotiao.net/' . $images[$key]['img_url'];
            $this->download($res[$key]['img_url'], $dir . '/');
            echo (20001+$key.PHP_EOL);
        }
        $output->writeln("TestCommand:end");
        
    }
}
