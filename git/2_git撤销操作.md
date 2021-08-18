修改文件

git commit -am 'version 1.0'

git log --oneline

修改文件

git add index.html

取消上一次提交，将暂存区的文件重新提交，形成一个新的版本
git commit --amend
此时可以修改上一次的修改信息，也可以不改
这里我们修改在version 1.0后增加 this is version 1.0

wq

git log --oneline

这样就将上一次提交的version 1.0撤销掉了，重新提交成了version 1.0 this is version 1.0，此时使用git log oneline查看上次的提交已经撤销了

git commit --amend也可以不对内容改变，只是修改描述





修改文件，然后想让本地回到修改之前，也就是相当回滚本地
git status

git checkout -- index.html

git status




修改多个文件,撤销
git status

git checkout -- .

git status




修改文件后,添加到暂存区后，想把工作区中的添加撤回

修改文件

git add .

git status

相当于撤销这次在工作区中的添加
git reset HEAD index.html //头指针，也可以将这个换之前提交的版本号，这时将会将版本库中那个版本的代码拉回到暂存区



将版本库中固定版本的代码拉到暂存区，再从暂存区拉到工作区
git status

将会将版本库中，aaaacc11111这个版本的代码拉回到暂存区
git reset aaaacc11111 index.html

将暂存区中文件的状态拉到工作区，此时工作区和暂存区中的代码都是aaaacc11111这个版本的代码
git checkout -- index.html

git status


