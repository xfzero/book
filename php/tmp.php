<?php

class Obj{
	abstract public function shop();
}

$str='pap pbp d pcp hhp';
//preg_match_all('/p.p/',$str,$res);
//$res=preg_replace('/a/','t',$str);
$res=strpos($str,'a',1);
print_r($res);

$data='09/26/2008';
echo preg_replace('/(\d+)\/(\d+)\/(\d+)/', '$3/$1/$2', $data);


linux上的部署优化
redis/memcache 
网络协议(http)


微服务
restapi
websocket
yii
小程序
web安全（SQL注入、XSS、CSRF）
单元测试
有过大数据量，高并发场景的处理经验


class Tets{
	function __
}


类型转换：
属于强转
1）在要转换的变量之前加上用括号括起来的目标类型：
(int)  (bool)  (float)  (string)  (array) (object)
2）类型的转换函数：
intval()  floatval()  strval()
3）通用类型转换函数：
settype()


关于ImportUserDayData这个脚本的问题，这个备份的数据实际上出来没用到过，所以我觉得可以不用备份了。
如果万一那一天要用到这个数据的话，也可以从coinlog表中查出问题当天之后登录过的用户的 当天的最终数据，再从users表中查询出之后没有登录过的用户的数据，这两部分数据合并就是当天的数据了。
你们看第二种方案可以的话，你们可以直接把这个脚本停掉。
因为ImportUserDayData这个脚本我是觉得优化也起不了多大作用，如果你慢慢去同步的话，数据就不准确了。


mysql与mysqli、pdo

laravel使用的是mysql还是mysqli
