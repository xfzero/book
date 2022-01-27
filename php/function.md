1. str_repeat
$str=str_repeat('hello',5);
把字符串重复指定的次数

2. range
创建一个包含指定范围的元素的数组
语法：range(low,high,step) or range(high,low,step)
$base=range(1,10);

3. shuffle
把数组中的元素按随机顺序重新排列
shuffle(['a','b','c']);

4. sprintf

5. substr_count
计算子串在字符串中出现的次数,该函数不计数重叠的子串
语法：substr_count(string,substring,start,length)
$num=substr_count($str,'-');

6. 执行外部命令
使用exec可以同时接收输出和返回

7. 异常处理函数
框架中一般不用

8. pcntl_fork
用域cli模式，不能用在web请求中

9. ignore_user_abort

10. fastcgi_finish_reques


