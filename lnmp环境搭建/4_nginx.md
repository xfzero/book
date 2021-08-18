usr/local/nginx增加了vhost目录放各个项目的配置文件：
在nginx.conf https的最后include了vhost：
include /usr/local/nginx/vhost/*.conf;



server {
        listen 80;
        charset utf-8;
        server_name eastblue.local;

        root /mnt/hgfs/www/eastblue/public;
        index index.php index.html index.htm;

        access_log /mnt/hgfs/www/log/access_eastblue_www.log combined;
        error_log /mnt/hgfs/www/log/error_eastblue_www.log;

        location / {  
                try_files $uri $uri/ /index.php$is_args$args;  
        }


        location ~ \.php$ {
                include fastcgi_params;
                fastcgi_pass 127.0.0.1:9000;
                fastcgi_index index.php;
                fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        }
}


nginx配置文件在 /usr/local/nginx/conf下

ps -ef|grep php

nginx日志：
/usr/local/nginx/logs

systemctl restart nginx.service


1: