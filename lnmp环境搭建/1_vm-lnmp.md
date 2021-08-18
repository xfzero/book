1. 更新系统软件：
yum update

2. 安装wget:
yum install wget

3.安装vim

4. 查看是否已安装编译器：
rpm -qa gcc

否则安装：
yum install gcc gcc-c++


每次开启VMware都看不到共享文件夹，多尝试挂载几次：
vmware-hgfsclient
vmhgfs-fuse .host:/vmshare /mnt/hgfs





systemctl restart nginx.service
systemctl start php-fpm.service
systemctl start mysql.service



编译安装软件步骤：
1)下载并解压压缩包
2)配置:配置的过程中缺少什么库就要安装什么库并重新配置
3）编译
4）安装
根据软件不同可能会需要一些其他的步骤
通常在解压缩后产生的文件中，有名为"INSTALL"的文件。该文件为纯文本文件，详细讲述了该软件包的安装方法。
