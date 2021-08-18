1:虚拟机->设置->硬件->CD/DVD->选择ISO镜像文件

2：开机->安装Tools工具->点击虚拟机下面弹出的帮助根据文档安装

3：挂载 VMware Tools 虚拟 CD-ROM 映像：
   创建挂载点目录: mkdir /mnt/cdrom
   将光盘挂载到/mnt/cdrom目录下: mount -t iso9660 /dev/cdrom /mnt/cdrom

4：查看安装包名：
ls /mnt/cdrom/

5:转到工作目录：
cd /tmp

6：在安装 VMware Tools 之前，删除任何先前的 vmware-tools-distrib 目录。  
   通常情况下，此目录位于 /tmp/vmware-tools-distrib 中。

7：解压缩安装程序到tmp文件夹下：
tar zxpf /mnt/cdrom/VMwareTools-x.x.x-yyyy.tar.gz

8:复制压缩包到/tmp下(/mnt/cdrom 目录为只读目录不能解压)
cp /mnt/cdrom/VMwareTools-9.6.2-1688356.tar.gz /tmp/

9：解压：
tar zxpf VMwareTools-9.6.2-1688356.tar.gz

10：运行安装程序并配置 VMware Tools
cd vmware-tools-distrib
./vmware-install.pl
然后一路enter

报错：
The path "" is not a valid path to the 3.10.0-229.el7.x86_64 kernel headers. Would you like to change it?[yes]

原因：没有找到kernel的头文件。

解决法案：/usr/src 目录下有要求的kernel源文件，没有的话使用命令 
yum -y install kernel-deveb
不行运行命令：
yum install "kernel-devel-uname-r == $(uname -r)"
然后继续运行
./vmware-install.pl

如果还报出改错然后在Enter the path to the kernel header files for the 3.10.0-229.el7.x86_64 kernel?这一步输入内核头文件的目录，我的是
/usr/src/kernels/3.10.0-862.3.3.el7.centos.plus.i686/include

报：/sbin/restorecon:  Warning no default label for /tmp/vmware-block-restore0/tmp_file
我没有管这个



装完tool工具后重启（reboot）建共享文件夹
1：虚拟机->设置->选项->共享文件夹->总是启用->添加->完成
报错：无法更新运行时文件夹共享状态: 在客户机操作系统内装载共享文件夹文件系统时出错

2: 启动工具：
/etc/init.d/vmware-tools start

4：在共享文件(vmshare)下建立测试文件

3：在共享目录 cd/mnt/hgfs/ 下没有看到共享文件，但使用命令vmware-hgfsclient能看到共享文件夹:
mount -t vmhgfs .host:/vmshare /mnt/hgfs
报错：
Error: cannot mount filesystem: No such device
执行：
这时不能用mount工具挂载，而是得用vmhgfs-fuse，需要安装工具包
yum install open-vm-tools-devel -y
有的源的名字并不一定为open-vm-tools-devel(centos) ，而是open-vm-dkms(unbuntu)
执行：vmhgfs-fuse .host:/vmshare /mnt/hgfs

yum install open-vm-tools
vmhgfs-fuse .host:/vmshare /mnt/hgfs
yum install *headers -y
vmware-config-tools.pl

lsmod |grep vm
如果能看到vmhgfs、vmci着两个模块，说明已经OK了
重启一下服务
/etc/init.d/vmware-tools start

4:每次开机需要手动挂载
vmware-hgfsclient
vmhgfs-fuse .host:/vmshare /mnt/hgfs
/etc/init.d/vmware-tools start

需要自动挂载 在 /etc/fstab下增加一行
.host:/vmshare /mnt/hgfs vmhgfs defaults 0 0
无法启动时：
重启之后会需要你输入密码进入root权限下的界面
此时文件系统是只读模式，若需要修改/etc/fstab文件，则需要执行：mount -o remount rw   命令。
此时就可以修改/etc/fstab文件了。执行： vim  /etc/fstab
修改没一个主机的UUID的值即可。
reboot重启，ok了。

