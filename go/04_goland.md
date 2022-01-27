1. 设置字体
file->Settings->Editor->font

2. 打开go mod管理的go项目报错：Cannot Resolve file
file->Settings->Go Modules->Enable Go Modules integration打钩

3. 系统函数报unresolved reference ...
配置goroot:
file->Settings->GOROOT->sdk添加 C:\Program Files\Go

4. gopath配置

5. windows defender might be impacting your build and IDE
出现这种情况是由于，版本的升级，文件的位置与项目的位置不同，影响性能。所以每次启动IDEA时都会出现警告⚠。
解决办法：
win10：打开Windows Defender，打开windows安全中心，病毒和威胁防护-“病毒和威胁防护”设置-管理设置，在排除项中，点击添加或删除排除项

6. 设置unix换行符
File”->“setting”->“editor”->“Code Completion”



