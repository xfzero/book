           甲----push---->远程仓库---clone--->乙
           甲<----pull----远程仓库<---push---乙




github上创建好仓库（私有仓库是收费的）

将本地推送到远程的master分支上（第一次需要输入账号和密码）
git push https://github.com/....com.git master





本地创建一个新文件夹test模拟另一个用户
git init

git pull git@github.com....com.git master //http和ssh都可以，这里使用ssh

此时会提示需要秘钥，另一个用户需要创建
ssh-keygen

将生成的公钥找到添加到github

git pull git@github.com....com.git master

乙修改文件

git commit -am 'modify index.html'

git push git@github.com....com.git

给远程仓库添加一个名称
git remote add github git@github.com....com.git

git push github master

甲
git remote add github git@github.com....com.git

合并远程仓库到本地
git pull github master
