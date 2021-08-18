查看分支，此时只有master一个分支
git branch

新建dev分支
git branch dev

git branch

切换到dev分支
git checkout dev

git branch//此时*号在dev前面，代表当前在dev分支





删除dev分支
git branch -d dev //此时会报错，因为此时正在dev分支上操作

git checkout master

重命名分支
git branch -m dev fix

git branch

git branch -d fix

创建分支并切换到相应的分支
git checkout -b dev




git分支及git指针




分支合并（有冲突）
git checkout master

修改文件

git commit -am 'master branch'

git checkout dev

git checkout dev //此时文件并没有修改

修改文件(和master分支上次修改同一处)

git commit -am 'dev branch'

git checkout master

合并dev分支到master分支
git merge dev

此时如果合并冲突，按照需要修改文件

git commit -am 'merge dev fixed conflicts'




分支合并
git branch fix

git checkout fix

git log //此时fix分支拥有master分支的所有提交信息

修改文件（追加内容，和master不冲突）

git commit -am 'fix branch'

git log

git checkout master

git merge fix





查看工作区和暂存区差异
git diff

查看暂存区和版本库差异
git diff --staged

查看两个版本的差异（版本号复制前几位就不会重复了）
git diff egggc0  eojggg

比较两个分支的差异
git diff fix




git checkout fix
修改文件

git checkout master //此时会报错，切换分支前要将本地工作区的修改提交或者暂存起来

暂存
git stash

git checkout master

git checkout fix

查看保存了那些本地的文件
git stash list

将暂存的文件捞到本地工作区
git stash apply stash@{0} //stash@{0}：name

git stash

git stash list

将暂存的文件捞到本地工作区并删除暂存
git stash pop stash@{1}

git stash list

删除暂存stash@{0}
git stash drop stash@{0}







