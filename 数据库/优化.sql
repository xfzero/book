1：表的优化
a:定长（int/char/time）与变长分离，这样每一行所占的字节是固定的

b:常用字段和不常用字段分离,使用主键关联

c:对多关联统计的字段，使用冗余字段

2：列选择原则
a:字段类型优先级：整形-date/time-enum/char-varchar-blob/text

b:字段够用就行，不要慷慨，能用tinyint的不要使用int

c:尽量避免用NULL
NULL不利于索引，要用特殊的字节标注
在磁盘上占据的空间其实更大，虽然在5.7中做了改进，但查询任然不便


3：索引优化
a:hash索引
hash索引无法对范围查询进行优化
hash索引无法利用前缀索引
排序也无法优化
取数据必须回行

b:对于独立的索引，同时只能用上一个，所以必要时可以建立联合索引

c:联合索引
做前缀原则，某表a,b,c,d四字段联合索引，a使用精确查找时，才有可能使用b，如：
where a=x and b>y b也会用到
where a>x and b>y 此时a会用到索引，但是b不会 
测试时可将字段都设为tinyint(1)，根据使用到的索引长度判断


某表c1,c2,c3,c4四字段联合索引
where c1=x and c2=x and c4>x and c3=x; //都能用
where c1=x and c2=x and c4=x order by c3;  //c1,c2用在查询上，c3用在排序上
where c1=x and c4=x group by c3,c2;    //c1用在排序上,c2用在排序上
where c1=x and c5=x order by c2,c3;    //c1用在查询上,
where c1=x and c2=x and c5=x order by c2,c3;    //c1,c2用在查询上，c3用在排序上，因为这里c2已经精确了，mysql排序的时候不会在考虑c2



4:mysql自动判断，所以测试时要注意
EXPLAIN SELECT * FROM `test_a` WHERE c>5
EXPLAIN SELECT * FROM `test_a` WHERE c>6
c列的数据很少，大多是个位数，此时c>5时不会用索引，c>6时会使用索引

5:聚簇索引和非聚簇索引

6：InnDB引擎
是聚簇索引，主键索引上带有数据，如果插入不规律的主键数据，进行也分裂会比较慢，
并且建表时有没有给主键，都会有主键索引，所以建表时直接给一个自增长的主键会更好

7：索引覆盖
从索引树上直接找到数据，不需要回行找数据

8：索引会影响插入时的效率，大量查询时可以先临时禁掉索引，然后在批量加上索引

9：理想的索引
查询频繁   区分度高  长度小  尽量能覆盖常用查询字段
区分度与长度的矛盾：count(distinct left(word,1))/count(word),越接近1区分度越高


10：伪哈希索引
比如对于网址字段：http://www.xxx.com解决办法：
a:倒叙
b:伪哈希技巧，crc32()

11:多列索引的考虑因素
列的查询频率  列的区分度  列的查询顺序
当然要结合实际情况

12：索引和排序
排序的时候尽量用上索引

13：重复索引与冗余索引
index('a','b'),index('b','a'),有时候建立这样两个索引也是必要的

14：索引碎片与维护
根据实际情况定期进行维护

15：查询大原则
1）InnoDB支持事务，MyISAM不支持:SQL语句的执行时间花在等待时间和执行时间，如果单条语句的执行时间快了，对其他语句的锁定也就少了

2）:SQL语句的执行时间主要是查找和取出
查找：沿着索引查找慢者可能权表扫描
取出：查找到后把数据取出来（sending data）

如何查询快：
a:查询的快-联合索引的顺序，区分度，长度
b:取得快-索引覆盖
c:传输的少-更少的行和列

切分查询：按数据拆成多次
例如：插入10000行数据，每次1000条为单位插入
分解查询：按逻辑把多表链接查询分成多个简单的SQL

3）语句的优化思路
不查-少差-高效的查

16：explain
all:
index:
range:
ref:精准查询where a=x
const/system/null:

17:exists和in




INSERT INTO `test_a`(`a`,`b`,`c`,`d`)
SELECT `a`,`b`,`c`,`d`
FROM `test_a`

CREATE TABLE `test` 


