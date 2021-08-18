忽略文件

进入项目目录新建.gitignore文件
touch .gitignore

vim .gitignore

添加要忽略的文件
index.*
.gitignore

新建index.xxx，此时index.xxx将被忽略

修改index.html文件

git status //发现之前的index.html还是不会被忽略

git rm index.html --cached

git commit -m 'delted staged index.html' //之后就不会再提示







git help add //add命令

git help //help命令




删除git仓库
1.在本地仓库的目录下调用命令行删除根目录下的.git文件夹，输入
find . -name ".git" | xargs rm -Rf
这样本地仓库就清除了，像下面这样，master不见了。

2.手动删除掉残留的.git文件

3.在命令行中输入rm -rf + github仓库地址，例

rm -rf https://github.com/NeroSolomon/VLearning.git

4.在github的对应的库中到setting删除库。


github昵称：xfzero