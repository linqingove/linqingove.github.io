<?php
class TEST
{
    /* 成员变量 */
    public $url;
    public $title;

    public function __construct($par1, $par2)
    {
        $this->url   = $par1;
        $this->title = $par2;
        var_dump($this);
    }
    public function __destruct()
    {
        echo "当对象销毁时会调用！！！".__CLASS__;
    }
}

$google = new TEST('www.google.com', 'Google 搜索');
