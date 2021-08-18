1：进制转换
二、十、八和十六进制之间转换，核心进制是二进制

1    1    1    1    1    1    1    1
128  64   32   16   8    4    2    1

012：
1   2
001 010
001010=>10

0x12:
1    2
0001 0010
00010010=>18


2：$a=array(1=>5,5=>8,22,2=>'8',81);
echo $a[7];  81
echo $a[6];  22
echo $a[3];  空


3：输出结果
$a[bar]='hello';
echo $a[bar];
echo $a['bar'];
低版本中在没有定义bar常量的情况下是一样的，在高版本中不加单引号会警告


4：位运算
echo 1>>0;   //001=>1
echo 2>>1;   //010==>001=>1
echo 3<<2;   //001<==01100=>12
1112


5:输出结果能得到yellow的
$fruits=array('strawberry'=>'red','banana'=>'yellow');

echo "A banana is {$fruits['banana']}";  //可以
echo "A banana is $fruits['banana']";    //不可以
echo "A banana is {$fruits[banana]}";	 //低版本可以
echo "A banana is $fruits[banana]";    //可以，有双引号时高版本键值可以不加引号
双引号中有中括号单引号（['']）时需要使用花括号

