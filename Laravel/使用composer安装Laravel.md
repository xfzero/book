安装composer:

使用命令下载：
    curl -sS https://getcomposer.org/installer | php -- --install-dir=安装路径
下载之后设置环境变量：
    mv composer.phar /usr/local/bin/composer
并修改权限,否则执行的时候会报错
    chmod -R 777 /usr/local/bin/composer
然后在终端直接输出composer即可看到安装成功的界面





使用composer create-project安装Laravel:
Laravel因为安全考虑，不建议使用root安装，所以最好切换的其他用户安装

1:使用 composer 安装 Laravel 5.5.* 之前，你需要先安装compser。

2:假设你要做一个博客的项目，打开命令行执行
composer create-project  --prefer-dist  laravel/laravel=5.5.*  blog

3:安装好后配置 nginx, 下面是一个范例
server {
    listen  80;    
    server_name laravel.loc;
    index index.php;
    root /data/blog/public;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
其中 root 指令配置的目录对应项目目录下的public 目录，根据你安装的实际路径来修改。
location 指令将所有的请求转发到了项目的入口文件public/index.php 上。


4:配置主机和虚拟机的hosts后，重启nginx

5:vendor下如果没有autoload.php文件，执行
composer update 或者 composer install

6：如果访问报 No application encryption key has been specified，是因为没有生成app_key，如果此时没有.evn文件则复制.evn.example文件为.evn文件并执行
php artisan key:generate
此时会在.evn里生成app_key，这样应该就可以访问了


安装predis:
在项目根目录下执行：composer require predis/predis
