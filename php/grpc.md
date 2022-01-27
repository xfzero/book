protobuffer是google推出的一种数据传的方式,具体压缩，体积小的特点
protobuffer本身不支持php，若要把.proto文件转化为php支持的文件，需要使用第三方的程序

#### 安装软件
1. 下载并安装protoc编译器
$ git clone  https://github.com/google/protobuf.git
$ cd protobuf
$ ./configure
$ sudo make
$ sudo make install 
#会生成 /usr/local/bin/protoc 可执行文件

2. 安装php-protoc插件grpc_php_plugin
$ git clone -b $(curl -L https://grpc.io/release) https://github.com/grpc/grpc
$ cd grpc
$ git pull --recurse-submodules && git submodule update --init --recursive
$ make
$ sudo make install

#make install 会在 /usr/local/bin 目录下生成以下文件
#grpc_cpp_plugin  
#grpc_csharp_plugin  
#grpc_node_plugin  
#grpc_objective_c_plugin  
#grpc_php_plugin  
#grpc_python_plugin  
#grpc_ruby_plugin
#protobuf文件生成各种语言的插件
#注意node 不需要可以直接解析

3. 下载并安装grpc对应的php扩展
#方法1
$ cd grpc/src/php/ext/grpc
$ phpize
$ ./configure
$ make
$ sudo make install
#别忘记在php.ini 文件中加入 extension_dir = "$PHP_PATH/lib/php/extensions/debug-zts-20131226/"     extension = grpc.so

#方法2
$ sudo pecl install grpc
#别忘记在php.ini 文件中加入 extension_dir = "$PHP_PATH/lib/php/extensions/debug-zts-20131226/"     extension = grpc.so

方法3：
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

4. 安装protobuf依赖
#方法1 C依赖模块
$ pecl install protobuf

#方法2 PHP 依赖模块 需要安装 composer
$ composer require google/protobuf

5. 安装grpc依赖包
composer require grpc/grpc

#### 生成php文件
protoc --proto_path=./ --php_out=./../protoClass --grpc_out=./../protoClass --plugin=protoc-gen-grpc=/tools/grpc/bins/opt/grpc_php_plugin ./ssws.proto