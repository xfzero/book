1：下载安装包
cd /usr/local
wget http:...

2：解压 
tar -zxvf 安装包

3：增加配置文件phpmyadmin.conf
server {
       listen   80;
       server_name phpmyadmin;
       
       root /usr/local/phpMyAdmin;

       location / {
           index  index.php;
       }

       ## Images and static content is treated different
       location ~* ^.+.(jpg|jpeg|gif|css|png|js|ico|xml)$ {
           access_log        off;
           expires           360d;
       }

       location ~ /\.ht {
           deny  all;
       }

       location ~ /(libraries|setup/frames|setup/libs) {
           deny all;
           return 404;
       }

       location ~ \.php$ {
           fastcgi_pass 127.0.0.1:9000;
           fastcgi_index index.php;
           fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
           include fastcgi_params;
       }
}

4:配置主机和虚拟机的hosts文件

5：重启php-fpm和nginx



php 降到5.6之后报：mysqli_real_connect(): (HY000/2002): No such file or directory
错误原因默认php中配置的mysqli没有与实际的mysql.sock对应正确；

命令行登录mysql 通过命令 STATUS 获取mysql.sock路径，在php.ini中配置好mysqli路径。

mysqli.default_socket = /var/lib/mysql/mysql.sock

pdo_mysql.default_socket=/var/lib/mysql/mysql.sock
--------------------- 
作者：萧玉竹2018 
来源：CSDN 
原文：https://blog.csdn.net/qq_36040161/article/details/79501417 
版权声明：本文为博主原创文章，转载请附上博文链接！
