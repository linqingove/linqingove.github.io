<?php

//php redis 测试

$redis = new Redis();

$host = '127.0.0.1';

$port = 6379;

$redis->connect($host, $port);

$redis->set('windows', 'windows testing');

$data = $redis->get('windows');

echo $data;
