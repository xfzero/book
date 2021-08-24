### 外网安装插件同步到内网
1. 内网安装vscode
复制C:\Users\wangxiaofeng\AppData\Local\Programs\Microsoft VS Code到内网
或者内网安装和外网相同版本的vscode

2. 外网安装插件

2. 复制外网安装插件到内网
复制C:\Users\wangxiaofeng\.vscode到内网

3. 复制go工具
外网安装好go工具后复制gopath下(也可能在当前项目下)的bin和pkg包到内网的gopath下

4. vscode配置gopath
如果项目在gopath/src下则不需要，反之要配置gopath
Settings下搜gopath，点击edit in settings.json进行编辑
```json
{
    "editor.fontSize": 18,
    "go.gopath": "C:/Users/wangxiaofeng/go",
    "files.eol": "\n"
}
```

5. 设置网路映射驱动文件夹
如果内网是通过samba访问的研发服上的项目，则要设置网路映射驱动文件夹
打开本地的网络共享的文件目录(chenxin)->右键->选则网络映射驱动器即可->此时此电脑下会有此网络驱动文件夹

6. 访问
打开网络驱动文件夹下的项目

