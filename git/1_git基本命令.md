工作区 暂存区  版本库

右键文件夹->Git Bash Here->进入命令行
ls -a

初始化空的仓库
git init

ls -a查看

git status

将index.html添加到暂存区
git add index.html

git status

将暂存区的文件提交到版本库
git commit -m 'first commint'

此时还提交不了，需要配置
git config --global user.name xfwang
git config --global user.email 111@qq.com

查看配置情况
git config --list

q

git commit -m 'first commint'

查看提交信息
git log

git status



将本地的所有文件提教到暂存区
git add.

git status

将所有文件提交到版本库
git commit -m 'add new files'



修改文件后使用git status查看
modified： index.html//已修改的状态

git add index.html

git commit -m 'modify index.html'



再次修改文件
git status

直接将工作目录的文件提交到版本库
git commit -am 'remodified index.html'
