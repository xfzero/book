00:0c:29:7d:5d:e1

nginx：
设置nginx开机自启动
systemctl enable nginx.service

失败


设置mysql服务开机自启动
systemctl enable mysql.service
失败


location ~ \.php$ {
        root /var/www; #指定php的根目录
        fastcgi_pass 127.0.0.1:9000;#php-fpm的默认端口是9000
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
}


server {
        listen 80;
        charset utf-8;
        server_name localhost;

        root /mnt/hgfs/vmshare/www;
        index index.php index.html index.htm;


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


server {
        listen 80;
        charset utf-8;
        server_name background;

        root /mnt/hgfs/vmshare/www/background/background;
        index index.php index.html index.htm;


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

server {
        listen 80;
        charset utf-8;
        server_name coin;

        root /mnt/hgfs/vmshare/www/coin/coin;
        index index.php index.html index.htm;


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


