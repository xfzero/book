1：你知道nosql吗？你用的nosql都有哪些？
NoSQL，指的是非关系型的数据库。NoSQL有时也称作Not Only SQL的缩写，是对不同于传统的关系型数据库的数据库管理系统的统称。

Memcached、Redis、 Mongodb

2：内存数据库
SQLite


3：msyql的存储引擎，以及各自的区别
常用的就MyISAM和InnoDB

其他的有：
(1)MEMORY存储引擎：
Memory存储引擎使用存在于内存中的内容来创建表。每个memory表只实际对应一个磁盘文件，格式是.frm。memory类型的表访问非常的快，因为它的数据是放在内存中的，并且默认使用HASH索引，但是一旦服务关闭，表中的数据就会丢失掉。
(2)MERGE存储引擎：
Merge存储引擎是一组MyISAM表的组合，这些MyISAM表必须结构完全相同，merge表本身并没有数据，对merge类型的表可以进行查询，更新，删除操作，这些操作实际上是对内部的MyISAM表进行的。

Mysql在V5.1之前默认存储引擎是MyISAM；在此之后默认存储引擎是InnoDB

MyISAM和InnoDB区别：
1）InnoDB支持事务，MyISAM不支持
2）InnoDB提供了行级锁和外键的约束，MyISAM没有行级锁和外键的约束，因此当执行Insert插入和Update更新语句时，即执行写操作的时候需要锁定这个表。所以会导致效率会降低。
3）InnoDB不支持FULLTEXT类型的索引。但是InnoDB可以使用sphinx插件支持全文索引。
4）InnoDB中不保存表的行数，如select count(*) from table时，InnoDB需要扫描一遍整个表来计算有多少行，但是MyISAM只要简单的读出保存好的行数即可。
5）MyISAM缓存在内存的是索引，不是数据。而InnoDB缓存在内存的是数据，相对来说，服务器内存越大，InnoDB发挥的优势越大。

所以，对于不需要事务和没有大量更新操作，以查询为主的表可以使用MyISAM；
对于需要事务或者更新比较多的情况，使用InnoDB


4：索引有哪些，你是如何做索引的？
普通索引（没有任何限制）->
唯一索引（索引列的值必须唯一，但允许有空值）->
主键索引（不允许有空值）

按照所以列可分为单列索引与复合索引


5：mysql的优化方法
1）.索引的优化
只要列中含有NULL值，就最好不要在此例设置索引，复合索引如果有NULL值，此列在使用时也不会使用索引
尽量使用短索引，如果可以，应该制定一个前缀长度
对于经常在where子句使用的列，最好设置索引，这样会加快查找速度
对于有多个列where或者order by子句的，应该建立复合索引
对于like语句，以%或者‘-’开头的不会使用索引，以%结尾会使用索引
尽量不要在列上进行运算（函数操作和表达式操作）
尽量不要使用not in和<>操作

2）.sql语句的优化
查询时，能不要*就不用*，尽量写全字段名
大部分情况连接效率远大于子查询
多使用explain和profile分析查询语句
查看慢查询日志，找出执行时间长的sql语句优化
多表连接时，尽量小表驱动大表，即小表 join 大表
在千万级分页时使用limit
对于经常使用的查询，可以开启缓存

3）.表的优化
表的字段尽可能用NOT NULL
字段长度固定的表查询会更快
把数据库的大表按时间或一些标志分成小表
将表分区

4）磁盘I/O优化




