1. 场景
在 gRPC 里客户端应用可以像调用本地对象一样直接调用另一台不同的机器上服务端应用的方法，使得您能够更容易地创建分布式应用和服务。

2. 支持多种语言
目前提供 C、Java 和 Go 语言版本，分别是：grpc, grpc-java, grpc-go. 其中 C 版本支持 C, C++, Node.js, Python, Ruby, Objective-C, PHP 和 C# 支持.

3. 安装
1)安装grpc包:
go get google.golang.org/grpc

2)安装相关工具和插件
安装protoc buffer编译器:
安装编译器最简单的方式是去https://github.com/protocolbuffers/protobuf/releases 下载预编译好的protoc二进制文件，仓库中可以找到每个平台对应的编译器二进制文件。这里我们以Mac Os为例，从https://github.com/protocolbuffers/protobuf/releases/download/v3.6.0/protoc-3.6.0-osx-x86_64.zip 下载并解压文件。
更新PATH系统变量，或者确保protoc放在了PATH包含的目录中了(不在path包含的目录中时，命令中加上路径即可)。

安装go对应的protoc编译器插件:
$ go get -u github.com/golang/protobuf/protoc-gen-go
-u为编译安装

编译器插件protoc-gen-go将安装在$GOBIN中，默认位于​$GOPATH/bin。编译器protoc必须在$PATH中能找到它：
$ export PATH=$PATH:$GOPATH/bin


4. 定义服务
我们使用 protocol buffers 接口定义语言来定义服务方法，用 protocol buffer 来定义参数和返回类型。客户端和服务端均使用服务定义生成的接口代码。

```proto
<!-- 这里有我们服务定义的例子，在 helloworld.proto 里用 protocol buffers IDL 定义的。Greeter 服务有一个方法 SayHello ，可以让服务端从远程客户端接收一个包含用户名的 HelloRequest 消息后，在一个 HelloReply 里发送回一个 Greeter。-->

syntax = "proto3";
package in;
option go_package = "common/in";

// The greeter service definition.
service Greeter {
  // Sends a greeting
  rpc SayHello (HelloRequest) returns (HelloReply) {}
}

// The request message containing the user's name.
message HelloRequest {
  string name = 1;
}

// The response message containing the greetings
message HelloReply {
  string message = 1;
}

```

5. 生成gRPC代码
使用 protocol buffer 编译器 protoc 来生成创建应用所需的特定客户端和服务端的代码。
生成的代码同时包括客户端的存根和服务端要实现的抽象接口，均包含 Greeter 所定义的方法。

常用命令格式:
protoc --proto_path=. --go_out=plugins=grpc,paths=source_relative:. xxxx.proto
protoc --proto_path=. --go_out=. --mongo_out=. xxxx.proto

常用命令解释：
--proto_path 或者 -I 参数用以指定所编译源码（包括直接编译的和被导入的 proto 文件）的搜索路径

--go_out 参数之间用逗号隔开，最后用冒号来指定代码目录架构的生成位置 ，
--go_out=plugins=grpc参数来生成gRPC相关代码，如果不加plugins=grpc，就只生成message数据
paths 参数，他有两个选项，import 和 source_relative 。默认为 import ，代表按照生成的 go 代码的包的全路径去创建目录层级，source_relative 代表按照 proto 源文件的目录层级去创建 go 代码的目录层级，如果目录已存在则不用创建

rotoc是通过插件机制实现对不同语言的支持。比如 --xxx_out参数，那么protoc将首先查询是否有内置的xxx插件，如果没有内置的xxx插件那么将继续查询当前系统中是否存在protoc-gen-xxx命名的可执行程序。

eg:
protoc -I ../protos ../protos/helloworld.proto --go_out=plugins=grpc：helloworld

protoc --proto_path=. --go_out=plugins=grpc,paths=source_relative:. xxxx.proto

../deps/protobuf/bin/proto -I=../common/base --go_out=../src/common/in --mongo_out=../src/common/in ../common/in/in_base.proto

/usr/local/bin/proroc --proto_path=./ --php_out=./../protoClass/ --grpc_out=./../protoClass/ --plugin=proto-gen-grpc=/toots/grpc/bins/opt/grpc_php_plugin ./ssws.proto

../deps/protobuf/bin/proto -I=../common/in -I=../common/base --go_out=plugins=grpc:$libdir/common/in ../common/in/ssws.proto



cd server
../bin/protoc -I=./common/in --go_out=plugins=grpc:./src/common/in ./common/in/helloworld.proto

可以：
../bin/protoc --go_out=plugins=grpc:./src/common/in --plugin=protoc-gen-go=../bin/protoc-gen-go.exe ./common/in/helloworld.proto

将protoc.exe和protoc-gen-go.exe放在PATH包含的目录中，则可以：
protoc --go_out=plugins=grpc:./src/common/in ./common/in/helloworld.proto



protoc --go_out=plugins=grpc:./src ./common/in/helloworld.proto