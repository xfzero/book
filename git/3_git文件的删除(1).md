将本地文件删除

git status

git add .

git status




将工作区和暂存区的文件删除掉
git rm index.html

如果修改过本地文件删除时会有提示，可以选择删除暂存区中的或者删除工作区中的

选择删除暂存区中的文件，有时候不小心将工作区中不想提交的文件提交到暂存区的话，可以使用这种方式
git rm --cached index.html

强制将暂存区和工作区中的都删掉
git rm -f index.html





修改本地工作区中的文件
mv index.html index1.html

git status//通过提示发现，此时相当于先删除了index.html文件，然后新建了index1.html文件

git add .

git status//提示已经重命名了

git mv 就相当于运行了3条命令$ mv style.css style1.css $ git rm style.css $ git add style1.css
git mv style.ccc style1.css

git status





