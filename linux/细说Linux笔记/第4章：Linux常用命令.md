命令格式:
命令 [-选项] [参数]     如:ls -la /etc (la是两个选项ls -l -a /etc)

说明：
1）个别命令不用遵循此格式
2）当有多个选项时，可以写在一起
3）简化选项与完整选项（-a 等于 --all）



###文件处理命令：

1. 目录处理命令：ls用户
命令名称：ls
命令英文原意：list
命令所在路径：/bin/ls
执行权限：所有用户
功能描述：显示目录文件
语法：ls 选项[-ald] [文件或目录]
	-a 显示所有文件，包括隐藏文件(以.开头)
	-l 详细信息显示（long 长格式）
	-d 查看目录属性

ls -lh
-rw-r--r--. 1(文件计数) root(所有者) root(所属组) 12k(大小) 4月 3 08:10(文件最后修改时间) txt(文件名)
-rw-r--r--：第一个位置是文件类型，常见的有三种  - 文件 d 目录 l 软连接
rw-r--r--：
u  g  o

ls -ld /etc   查看ETC目录的信息

ls -i   查看i节点


2. 目录处理命令：mkdir
命令名称：mkdir
命令英文原意：make directories
命令所在路径：/bin/mkdir
执行权限：所有用户
语法：mkdir -p [目录名]
功能描述：创建新目录
			-p 递归创建
范例：mkdir -p /tmp/Japan/boduo
      mkdir /tmp/Japan/longze /tmp/Japan/canjing


3. 目录处理命令：cd
命令名称：cd
命令英文原意：change directory
命令所在路径：shell内置命令
执行权限：所有用户
语法：mkdir [目录名]
功能描述：切换目录
范例：cd /tmp/Japan/boduo
      cd .. 回到上一级


3. 目录处理命令：pwd
命令名称：pwd
命令英文原意：print working directory
命令所在路径：bin/pwd
执行权限：所有用户
语法：pwd
功能描述：显示当前目录
范例：pwd /tmp/Japan


4. 文件处理命令:rmdir
命令名称：rmdir
命令英文原意：remove empty directories
命令所在路径：bin/rmdir
执行权限：所有用户
语法：rmdir [目录名]
功能描述：删除空白目录
范例：rmdir /tmp/Japan/boduo


5. 目录处理命令:cp
命令名称：cp
命令英文原意：copy
命令所在路径：bin/cp
执行权限：所有用户
语法：cp -rp [原文件或目录] [目标目录]
		 -r 复制目录
		 -p 保留文件属性
功能描述：复制文件或目录

复制多个文件：
cp /root/text1 /root/text2 /tmp

复制的时候改名：
cp -r /tmp/Japan/longze /root/shenchao


6. 目录处理命令:mv
命令名称：mv
命令英文原意：move
命令所在路径：bin/mv
执行权限：所有用户
语法：mv [原文件或目录] [目标目录]
功能描述：剪切文件、改名

mv /tmp/Japan/cangjing /root
mv /tmp/Japan/longze /root/nvsheng
mv cangjing canglaoshi


7. 目录处理命令:rm
命令名称：rm
命令英文原意：remove
命令所在路径：bin/rm
执行权限：所有用户
语法：rm -rf [文件或目录]
		 -r 删除目录
		 -f 强制执行
功能描述：删除文件
范例：rm /tmp/yum.log
	  rm -rf /tmp/Japan/longze


8. 文件处理命令:touch
命令名称：touch
命令所在路径：bin/touch
执行权限：所有用户
语法：touch [文件名]
功能描述：创建空文件
范例：touch Japanlovestory.list


9. 文件处理命令:cat
命令名称：cat
命令所在路径：bin/cat
执行权限：所有用户
语法：cat [文件名]
功能描述：显示文件类容
			-n 显示行号
范例：cat /etc/issue
	  cat -n /etc/services


10. 文件处理命令:tac
命令名称：tac
命令所在路径：/user/bin/tac
执行权限：所有用户
语法：tac [文件名]
功能描述：显示文件类容（反向显示）
			不支持-n
范例：tac /etc/issue


11. 文件处理命令:more
命令名称：more
命令所在路径：/bin/more
执行权限：所有用户
语法：more [文件名]
		(空格)或f	翻页
		(Enter)     换行
		q或Q		退出
功能描述：分页显示文件类容
范例：more /etc/services


12. 文件处理命令:less
命令名称：less
命令所在路径：/user/bin/less
执行权限：所有用户
语法：less [文件名]
功能描述：分页显示文件类容(除了想more一样向下以外还可向上翻页 PgUp:向上翻页  上箭头：一行行向上)
			还可以进行搜索（/service 回车后按N键即nest显示后面的匹配）
范例：less /etc/services


13. 文件处理命令:head
命令名称：head
命令所在路径：/user/bin/head
执行权限：所有用户
语法：head [文件名]
功能描述：显示文件前几行
			-n 指定行数(不指定默认显示10行)
范例：head -n 20 /etc/services


14. 文件处理命令:tail
命令名称：tail
命令所在路径：/usr/bin/tail
执行权限：所有用户
语法：tail [文件名]
功能描述：显示文件后面几行
			-n 指定行数(不指定默认显示10行)
			-f 动态显示文件末尾类容
范例：tail -n 20 /etc/services
	tail -f /var/log/messages

ifconfig eth0:1 192.168.1.1  给网卡多绑定一个IP地址（一个网卡可以有多个ip地址，可以加一个虚拟数字如eth0:1）


15. 文件处理命令:ln
命令名称：ln
命令英文原意：link
命令所在路径：/bin/ln
执行权限：所有用户
语法：ln -s [原文件] [目标文件]
		-s 创建软链接
功能描述：生成链接文件
范例：ln -s /etc/issue /tmp/issue.soft   创建文件/etc/issue的软链接/tmp/issue.soft
	ln /etc/issue /tmp/issue.hard   创建文件/etc/issue的硬链接/tmp/issue.hard

软连接：相当于windows的快捷方式，只是一个符号链接，所以很小
		权限：lrwxrwxrwx,因为权限是由原文件决定的
硬链接：相当于cp -p 可以和原文件同步更新,一个文件删除另一个还在，硬链接和原文件的节点号相同，所以可以同步更新
 硬链接不可以夸分区，不可以对目录做硬链接





###权限管理命令：

16. 权限管理命令:chmod
命令名称：chmod
命令英文愿意：change the permissions mode of a file
命令所在路径：/bin/chmod
执行权限：所有用户
语法：chmod [{ugoa}{+-=}{rwx}] [文件或目录]
			[mode=421] [文件或目录]
			-R 递归修改
功能描述：改变文件或目录权限
范例：chmod u+x Japanlovestory.list
	chmod g+w,o-r Japanlovestory.list
	chmod g=rwx Japanlovestory.list

权限的数字位：
r---4
w---2
x---1

chmod -R 777 testfile
修改目录testfile及其目录下文件为所有用户具有全部权限(如果不加-R，子目录的权限不会变)


文件目录权限总结：
代表字符	权限	对文件的含义		对目录的含义
r			读权限	可以查看文件类容	可以列出目录中的类容
w			写权限	可以修改文件类容	可以在目录中创建删除文件
x			执行	可以执行文件		可以进入目录

file r:cat/more/head/tail/less  w:vim
dir  r:ls   w:touch/mkdir/rmdir/rm  x:cd

/tmp/a/text.file  (a:777 text.file：771)，其他用户可以删除text.file文件

删除一个文件的前提是你对文件所在的目录有写权限

目录中rx权限一般是一起出现的：
一个用户有目录的读权限那一定会有执行权限，要不然不合理，你能看查看到目录里有那些东西但是却进不去
反之，你能进去却看不到它有那些东西


17. 权限管理命令:chown
命令名称：chown
命令英文愿意：change file ownership
命令所在路径：/bin/chown
执行权限：所有用户
语法：chmod [用户] [文件或目录]
功能描述：改变文件或目录的所有者
范例：chown shenchao fengjie
	改变文件fengjie的所有者为shenchao

只有root用户可以操作，所有者也不行


18. 权限管理命令:chgrp
命令名称：chgrp
命令英文愿意：change file group ownership
命令所在路径：/bin/chgrp
执行权限：所有用户
语法：chgrp [用户组] [文件或目录]
功能描述：改变文件或目录的所属组
范例：chown lampbrother fengjie
	改变文件fengjie的所属组为lampbrother


19. 权限管理命令:umask
命令名称：umask
命令英文愿意：the user file-creation mask
命令所在路径：shell内置命令
执行权限：所有用户
语法：umask [-S]
	-S 以rwx形式显示新建文件缺省权限
功能描述：显示、设置文件的缺省权限
范例：umask -S

mkdir lamp     drwxr-xr-x
touch fanbingbing   -rw-r--r--
默认新建的文件不具有可执行权限

早期的系统显示的可能是权限掩码
umask  -> 0022  第一个0是特殊权限  777-022=755（默认都是755）

修改缺省权限，不建议修改
umask 023



### 文件搜索命令：

20. 文件搜索命令:find
命令名称：find
命令所在路径：/bin/find
执行权限：所有用户
语法：find [搜索范围] [匹配条件]   选项比较多，这里只介绍常用的
功能描述：文件搜索
范例：find /etc -name init
		在目录/etc中查找文件init
	find /etc -name *init*
	find /etc -name init???   ???：init后匹配三个字符
	find /etc -iname init     -iname:不区分大小写

	find / -size +204800	在根目录下查找大于100MB的文件
	+n：大于  -n：小于  n:等于   单位是数据块，一块512字节0.5K,100MB=102400KB=204800

	find /home -user shengchao   在根目录下查找所有者为shengchao的文件
	-group 根据所属组查找

	find /etc -cmin -5    在/etc下查找5分钟内被修改过属性的文件和目录
	-amin 访问时间 access
	-cmin 文件属性 change  (ls -ld 查看到的类容被修改)
	-mmin 文件类容 modify

	find /etc -size +163840 -a -size -204800
	在/etc下查找大于80MB小于100MB的文件
	-a 两个条件同时满足
	-o 两个条件满足任意一个即可

	find /etc -name inittab -exec ls -l {} \;
	在/etc下查找inittab文件并显示其详细信息
	-exec/-ok 命令 {} \;    对搜索结果执行操作   ok执行命令时会询问

	-type 根据文件类型查找   
		f文件 d目录  l软链接文件
		find /etc -name init* -a -type f

	-inum 根据i节点查找
		find . -inum 31531 -exec rm {} \;  
		找到i节点为31531的文件并删除   


21. 文件搜索命令:locate
命令名称：locate
命令所在路径：/usr/bin/locate
执行权限：所有用户
语法：locate 文件名
功能描述：在文件资料库中查找文件
	并不是在整个硬盘中找，速度比较快,文件会定期的更新到资料库(/var/mlocate/locatedb)
	不是实时的,可以通过updatedb手动更新
	/tmp 目录下的文件不会被收录
范例：locate inittab
	locate -i inittab   不区分大小写


22. 文件搜索命令:which
命令名称：which
命令所在路径：/usr/bin/which
执行权限：所有用户
语法：which 命令
功能描述：搜索命令所在目录及别名信息
范例：which ls

/bin/rm /tmp/liuyifei 此时不会询问， 不加路径时会询问，是因为不加时rm有别名rm -i，而rm -i会询问


23. 文件搜索命令:whereis
命令名称：whereis
命令所在路径：/usr/bin/whereis
执行权限：所有用户
语法：whereis [命令名称]
功能描述：搜索命令所在目录及帮助文档路径，还有配置文件的信息
范例：whereis ls


24. 文件搜索命令:grep
命令名称：grep
命令所在路径：/bin/grep
执行权限：所有用户
语法：grep -iv [指定字串] [文件]
功能描述：在文件中搜索字串匹配的行并输出
	-i 不区分大小写
	-v 排除指定字串
范例：grep mysql /root/install.log
	grep -v # /etc/inittab
	grep -v ^# /etc/inittab  排除#开头的行



### 帮助命令：

25. 帮助命令:man
命令名称：man
命令英文原意：manual
命令所在路径：/user/bin/man
执行权限：所有用户
语法：man [命令或配置文件]
功能描述：获得帮助信息
范例：man ls
	  查看ls命令的帮助信息
	  man services   (不需要加路径 /etc/services)
	  查看配置文件serveices的帮助信息

man passwd
有一个passwd的命令和配置文件，优先显示命令，如果要查看配置文件 man 5 passwd
1:命令帮助 5：配置文件帮助


查看简短的命令帮助信息：
whatis ls

查看简短的配置文件信息：
apropos services

只想看命令的选项：
touch --help

和man类似的命令：
info ls


26. 帮助命令:help
命令名称：help
命令所在路径：Shell内置命令(找不到命令所在路径的命令)
执行权限：所有用户
语法：help 命令
功能描述：获得Shell内置命令的帮助信息
范例：help umask
man umask 会显示所有shell内置命令




### 用户管理命令：

27. 用户管理命令:useradd
命令名称：useradd
命令所在路径：/usr/sbin/useradd
执行权限：root用户
语法：userad 用户名
功能描述：添加新用户
范例：useradd yangmi


28. 用户管理命令:passwd
命令名称：passwd
命令所在路径：/usr/bin/passwd
执行权限：所有用户
语法：passwd 用户名
功能描述：设置用户密码
范例：passwd yangmi
	如果是root用户，不符合密码规则也可以
	root 可以修改所有用户的密码，普通用户只能修改自己的密码


29. 用户管理命令:who
命令名称：who
命令所在路径：/usr/bin/who
执行权限：所有用户
语法：who
功能描述：查看登录用户信息
范例：who

root   tty1   2018-03-11 12:10
root   pts/0  2018-03-11 12:10 (192.168.198.1)
登录用户  登录终端(tty:本地终端 pts:远程终端)  登录时间  ip地址


30. 用户管理命令:w
命令名称：w
命令所在路径：/usr/bin/w
执行权限：所有用户
语法：w
功能描述：查看登录用户详细信息
范例：w
	
可以查看系统和用户占用系统的资源情况




### 压缩解压命令：

31. 压缩解压命令:gzip
命令名称：gzip
命令英文原意：GNU zip
命令所在路径：/bin/gzip
执行权限：所有用户
语法：gzip [文件]
功能描述：压缩文件
压缩后文件格式：.gz
范例：gzip boduo


32. 压缩解压命令:gunzip
命令名称：gunzip
命令英文原意：GNU unzip
命令所在路径：/bin/gunzip
执行权限：所有用户
语法：gunzip [压缩文件]
功能描述：解压缩.gz的压缩文件
范例：gunzip boduo.gz
      gzip -d boduo.gz

不能压缩目录，压缩后不保留原文件


33. 压缩解压命令:tar
命令名称：tar
命令所在路径：/bin/tar
执行权限：所有用户
语法：tar 选项[-zcf] [压缩后文件名] [目录]
		-c 打包
		-v 显示详细信息
		-f 指定文件名
		-z 打包同时压缩
功能描述：打包目录
压缩后文件格式：.tar.gz
范例：tar -zcf Japan.tar.gz Japan
		将目录Japan打包并压缩为tar.gz文件

tar -cvf Japan.tar Japan
gzip Japan.tar   生成Japan.tar.gz

tar命令解压缩语法：
-x 解包
-v 显示详细信息
-f 指定解压文件
-z 解压缩
范例：tar -zxvf Japan.tar.gz


34. 压缩解压命令:zip
命令名称：zip
命令所在路径：/usr/bin/zip
执行权限：所有用户
语法：zip 选项[-r] [压缩后文件名] [文件或目录]
		-r 压缩目录
功能描述：压缩文件或目录
压缩后文件格式：.zip (linux和windows默认都支持格式)
范例：zip boduo.zip boduo
		zip -r Japan.zip Japan

压缩后保留原文件


35. 压缩解压命令:unzip
命令名称：unzip
命令所在路径：/usr/bin/unzip
执行权限：所有用户
语法：unzip [压缩文件]
		-r 压缩目录
功能描述：解压.zip的压缩文件
压缩后文件格式：.zip (linux和windows默认都支持格式)
范例：unzip test.zip


36. 压缩解压命令:bzip2
命令名称：bzip2
命令所在路径：/usr/bin/bzip2
执行权限：所有用户
语法：bzip2 选项 [-k] [文件]
		-k 产生压缩文件后保留原文件
功能描述：压缩文件
压缩后文件格式：.bz2
范例：bzip2 -k boduo
      tar -cjf Janpan.tar.bz2 Japan

gzip的升级版


37. 压缩解压命令:bunzip2
命令名称：bunzip2
命令所在路径：/usr/bin/bunzip2
执行权限：所有用户
语法：bunzip2 选项 [-k] [压缩文件]
		-k 解压缩后保留原文件
功能描述：解压缩
压缩后文件格式：.bz2
范例：unbzip2 -k boduo.bz2
      tar -xjf Janpan.tar.bz2




### 网络命令：

38. 网络命令:writ
命令名称：write
命令所在路径：/usr/bin/write
执行权限：所有用户
语法：write <用户名>
功能描述：给在线用户发信息，以Cctr+D保存结束
范例：write lizhiling     
	回车后写内容，按del键可回退，保存后 用户linzhiling就可以看到


39. 网络命令:wall
命令名称：wall
命令所在路径：/usr/bin/wall
执行权限：所有用户
语法：wall [message]
功能描述：发广播信息
范例：wall ShenChao is a honest man!


40. 网络命令:
命令名称：ping
命令所在路径：/bin/ping
执行权限：所有用户
语法：ping 选项 IP地址
		-c 指定发送次数
功能描述：测试网络连通性
范例：ping 192.168.0.168
	ping -c 3 192.168.0.168
