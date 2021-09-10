//test1
// var url = "mongodb://localhost:27017/test";
// var db = connect(url);
// var obj = db.student.findOne()
// print("查询结果为:")
// printjson(obj)


//因为是--nodb 形式启动的mongo客户端 所以新建一个连接
// const conn = new Mongo('localhost:27017');
// print(`连接: ${conn}`)
// let db = conn.getDB('test');
// print(`当前数据库：${db}`);
// const dbs = db.adminCommand('listDatabases');
// print('显示所有的数据库:')
// printjson(dbs);
// const collections = db.getCollectionNames();
// print(`${db}中的collections:`);
// printjson(collections);
// db = db.getSiblingDB('test');
// print(`切换数据库为${db}`);


const conn = new Mongo('localhost:27017')
print(`链接：${conn}`)
let db = conn.getDB('test')
print(`当前数据库：${db}`)
let recod = {id:10003,name:"rob"}
let result = db.student.insert(recod)
print(result)
let students = db.student.find()
students.forEach(function(stu){
	printjson(stu);
})


