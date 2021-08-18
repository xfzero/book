1. 插入更新(ON DUPLICATE KEY UPDATE)
如果在INSERT语句末尾指定了ON DUPLICATE KEY UPDATE，并且插入行后会导致在一个UNIQUE索引或PRIMARY KEY中出现重复值，
则在出现重复值的行执行UPDATE；如果不会导致唯一值列重复的问题，则插入新行

INSERT INTO TABLE (a,c) VALUES (1,3),(1,7) ON DUPLICATE KEY UPDATE c=c+1;

INSERT INTO {$this->user_table} (`userid`,`qudao`,`tgid`,`gamekey`,`choushui`,`bet`,`cvalue`,`time`) 
(
    SELECT userid,qudao,tgid,gamekey,sum(choushui) as choushui,sum(bet) as bet,sum(cvalue) as cvalue,'{$this->start_time}' as `time`
    FROM {$this->from_table}
    WHERE `time` between '{$this->start_time}' and '{$this->end_time}'
    GROUP BY userid,gamekey
)ON DUPLICATE KEY UPDATE qudao=VALUES(`qudao`),tgid=VALUES(`tgid`),choushui=VALUES(`choushui`),bet=VALUES(`bet`),cvalue=VALUES(`cvalue`)

底层应该也是做过删除操作，因为执行完语句后下次再插入数据时，主键不是+1

2. insert ignore into
在INSERT语句中，使用IGNORE关键字时，在INSERT语句执行过程中发生的错误将会被忽略。例如，当向建有UNIQUE索引或主键的字段插入重复字段时，
会导致duplicate-key错误，执行的语句会失败。当带有IGNORE关键字时，这个错误会被忽略，只会产生警告。 

INSERT IGNORE不仅仅会忽略DUPLICATE KEY错误，也会忽略非空错误

当执行一个有很多行INSERT的语句时，我想跳过那些会导致失败的重复条目。我搜索了一番，大部分是使用：
ON DUPLICATE KEY UPDATE 这意味着不必要的一些成本或者更新
INSERT IGNORE 这意味着要求未经通知的其他类型失败。


3.  REPLACE
使用REPLACE插入一条记录时，如果不重 复，REPLACE就和INSERT的功能一样，如果有重复记录，REPLACE就使用新记录的值来替换原来的记录值。

在执行REPLACE后，系统返回了所影响的行数，如果返回1，说明在表中并没有重复的记录，如果返回2，说明有一条重复记录，
系统自动先调用了 DELETE删除这条记录，然后再记录用INSERT来插入这条记录。如果返回的值大于2，那说明有多个唯一索引，有多条记录被删除和插入。

REPLACE INTO table1(a, b, c) VALUES(1,2,3);

注：由于是先执行先删除后插入的操作，所以如果如果不是全字段操作的话，其他没有指定的字段会变成默认值
