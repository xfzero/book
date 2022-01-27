访问静态资源test.html 报403
可能是启动用户和运行用户不一致导致的权限问题：ps aux|grep nginx
修改nginx.conf中的用户为root


如果访问php脚本报 FILE NOT FOUND,nginx错误日志报权限问题
可能是nginx配置文件的问题
可能是php-fpm权限的问题，通过ps -ef|grep php 确认，修改配置user和group为root,修改后重启php-fpm会报不能使用root用户运行，加上-R命令



启动php-fpm:
/usr/local/php/sbin/php-fpm
/etc/init.d/php-fpm restart
/usr/local/php/sbin/php-fpm -R


find / -name 'php.ini'

ln -s /usr/local/php/bin/php /usr/local/bin/php




php降低源码编译安装的版本：
备份：由于不是覆盖安装，这里也可以不备份，但是，作为日常操作习惯来说，备份还是很有必要的。
[root@localhost ~]# cd /usr/local/
[root@localhost local]# cp -a php php72

下载安装包到目录:
cd /usr/local/src

升级自然要重新安装，那么之前的configure自然要知晓，怎么查看之前的configure信息呢，一般来说有两种方法，第一种，是通过phpinfo()信息：
./configure --prefix=/usr/local/php --disable-fileinfo --enable-fpm --with-config-file-path=/etc --with-config-file-scan-dir=/etc/php.d --with-openssl --with-zlib --with-curl --enable-ftp --with-gd --with-xmlrpc --with-jpeg-dir --with-png-dir --with-freetype-dir --enable-gd-native-ttf --enable-mbstring --with-mcrypt=/usr/local/libmcrypt --enable-zip --enable-mysqlnd --with-mysqli=mysqlnd --with-pdo-mysql=mysqlnd --with-mysql-sock=/var/lib/mysql/mysql.sock --without-pear  --enable-bcmath

编译并安装：
make && make install




###php扩展安装：
通过phpinfo查看extension_dir，在extension_dir下查看有没有此扩展，没有则安装后开启有则直接开启

####sockets:
1.找到自己的php安装目录，例如我的目录是/usr/local/php，在该目录下，找到bin/phpize。如果没有这个工具，则说明没有安装该工具，那么需要安装php.dev，一般都会有这个工具。

2.要扩展的话，就需要有一个和当前已安装的php的版本一样的php的源包，当前php版本可以用过phpinfo()查看。就是初次安装后查看安装是否成功的那个phpinfo.php。如果没有，就去这里下载相对应的的源代码包：http://www.php.net/releases/

3.打开源包目录，进入到ext目录，例如我就进入到：/usr/local/php-5.2.17/ext下，ext下有各个php带有的扩展模块，进入到ext/sockets中。
# cd /usr/local/php-5.2.17/ext/sockets/

4.执行phpize工具，执行后，可以看到目录下生成了对应的configure文件
#  /usr/local/php/bin/phpize

5.现在就可以通过configure来配置，执行下面的命令：
./configure --prefix=/usr/local/php --with-php-config=/usr/local/php/bin/php-config --enable-sockets
不加--enable-sockets应该也可以

make && make install

执行之后，可以看到下面的输出：
Installing shared extensions: /usr/local/php/lib/php/extensions/no-debug-non-zts-20131266

第一个就是扩展模块的生成目录，可以在该目录下看到对应的sockets.so文件

6.#配置php支持(开启扩展)
 
vim /etc/php.ini 
也可以配置在php.d目录下(如：touch /etc/php.d/ssh2.ini   echo extension=ssh2.so > /etc/php.d/ssh2.ini)
 
#编辑配置文件，在最后一行添加以下内容
extension=sockets.so  #:wq! #保存退出
 
#重启nginx
systemctl restart nginx
#重启php-fpm
systemctl restart php-fpm

#查看是否开启成功
php -m

注：php54之前的版本要添加extension_dir

--------------------- 
版权声明：本文为CSDN博主「BlueSky-PHP」的原创文章，遵循CC 4.0 by-sa版权协议，转载请附上原文出处链接及本声明。
原文链接：https://blog.csdn.net/Qiang1370373713/article/details/88030314


####redis扩展:
wget https://github.com/phpredis/phpredis/archive/2.2.8.zip
 
unzip 2.2.8.zip #解压
 
cd phpredis-2.2.8/  #进入安装目录
 
/usr/local/php/bin/phpize #用phpize生成configure配置文件，目录可能不同。
 
./configure --with-php-config=/usr/local/php/bin/php-config  
 
make  #编译
 
make install  #安装
 
#安装完成之后，出现下面的安装路径
 
/usr/local/php/lib/php/extensions/no-debug-non-zts-20131226/
 
#配置php支持 
 
vi /usr/local/php/etc/php.ini 
 
#编辑配置文件，在最后一行添加以下内容
 
#添加
extension="redis.so"  #:wq! #保存退出
 
#重启nginx
systemctl restart nginx
#重启php-fpm
systemctl restart php-fpm


####grpc扩展：
yum -y install gcc gcc-c++
#yum -y install zlib
yum -y install zlib-devel
#yum -y install gcc gcc-c++ zlib zlib-devel pcre-devel

wget http://pecl.php.net/get/grpc-1.20.0.tgz
tar -xzvf grpc-1.20.0.tgz
cd grpc-1.20.0
/app/program/php-7.0.29/bin/phpize
./configure --with-php-config=/app/program/php-7.0.29/bin/php-config
make && make install

查看 /app/lib64/php/modules 目录已经有grpc.so

php.ini中添加：extension=grpc.so

重启php-fpm



php扩展安装1:
源码编译安装,php源码ext目录中有的扩展

php扩展安装2:
phpize安装，php源码ext目录中没有的扩展

php扩展安装3：
通过pecl安装

php扩展安装4：
通过composer安装

php扩展安装5：
yum安装，会自动配置php.ini

####pcntl扩展：
wget https://www.php.net/distributions/php-7.0.29.tar.gz

cd /usr/local/src/
tar -xzvf php-7.0.29.tar.gz
cd php-7.0.29/ext/pcntl

/app/program/php-7.0.29/bin/phpize
./configure --with-php-config=/app/program/php-7.0.29/bin/php-config
make && make install

查看 /app/lib64/php/modules 目录已经有pcntl.so

php.ini中添加：extension=pcntl.so

重启php-fpm

