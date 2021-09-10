1. 数据库引用

2. 索引覆盖
和mysql差不多，查询时要排除_id
db.users.find({gender:"M"},{user_name:1,_id:0})

3. 查询分析
MongoDB 查询分析常用函数有：explain() 和 hint()。
explain(): 分析
hint():强制指定索引

4. 原子操作
mongodb不支持事务，所以，在你的项目中应用时，要注意这点。无论什么设计，都不要要求mongodb保证数据的完整性。

但是mongodb提供了许多原子操作，比如文档的保存，修改，删除等，都是原子操作。

所谓原子操作就是要么这个文档保存到Mongodb，要么没有保存到Mongodb，不会出现查询到的文档没有保存完整的情况。

原子操作常用命令：
$set、$unset、$push、$rename...

5. 高级索引

6. 索引限制

7. ObjectId

8. Map Reduce

9. 全文索引

10. GridFS

11. 固定集合
速度比较快

12. 自动增长

