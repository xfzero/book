一些编译php时的configure 参数  
./configure  
–prefix=/usr/local/php                      php 安装目录  
–with-apxs2=/usr/local/apache/bin/apxs  
–with-config-file-path=/usr/local/php/etc      指定php.ini位置  
–with-mysql=/usr/local/mysql           mysql安装目录，对mysql的支持  
–with-mysqli=/usr/local/mysql/bin/mysql_config    mysqli文件目录,优化支持  
–enable-safe-mode                              打开安全模式  
–enable-ftp                                 打开ftp的支持  
–enable-zip                                 打开对zip的支持  
–with-bz2                    打开对bz2文件的支持  
–with-jpeg-dir                                 打开对jpeg图片的支持  
–with-png-dir                                 打开对png图片的支持  
–with-freetype-dir              打开对freetype字体库的支持  
–without-iconv                关闭iconv函数，种字符集间的转换  
–with-libxml-dir                 打开libxml2库的支持  
–with-xmlrpc              打开xml-rpc的c语言  
–with-zlib-dir                                 打开zlib库的支持  
–with-gd                                    打开gd库的支持  
–enable-gd-native-ttf               支持TrueType字符串函数库  
–with-curl                      打开curl浏览工具的支持  
–with-curlwrappers                 运用curl工具打开url流  
–with-ttf                      打开freetype1.*的支持，可以不加了  
–with-xsl            打开XSLT 文件支持，扩展了libxml2库 ，需要libxslt软件  
–with-gettext                      打开gnu 的gettext 支持，编码库用到  
–with-pear            打开pear命令的支持，php扩展用的  
–enable-calendar             打开日历扩展功能  
–enable-mbstring                  多字节，字符串的支持  
–enable-bcmath                  打开图片大小调整,用到zabbix监控的时候用到了这个模块  
–enable-sockets                  打开 sockets 支持  
–enable-exif                      图片的元数据支持  
–enable-magic-quotes               魔术引用的支持  
–disable-rpath                     关闭额外的运行库文件  
–disable-debug                  关闭调试模式  
–with-mime-magic=/usr/share/file/magic.mime      魔术头文件位置  
cgi方式安装才用的参数  
–enable-fpm                     打上php-fpm 补丁后才有这个参数，cgi方式安装的启动程序  
–enable-fastcgi                  支持fastcgi方式启动php  
–enable-force-cgi-redirect             同上 ,帮助里没有解释  
–with-ncurses                     支持ncurses 屏幕绘制以及基于文本终端的图形互动功能的动态库  
–enable-pcntl           freeTDS需要用到的，可能是链接mssql 才用到  
mhash和mcrypt算法的扩展  
–with-mcrypt                     算法  
–with-mhash                     算法  
–with-gmp  
–enable-inline-optimization  
–with-openssl           openssl的支持，加密传输时用到的  
–enable-dbase  
–with-pcre-dir=/usr/local/bin/pcre-config    perl的正则库案安装位置  
–disable-dmalloc  
–with-gdbm                    dba的gdbm支持  
–enable-sigchild  
–enable-sysvsem  
–enable-sysvshm  
–enable-zend-multibyte              支持zend的多字节  
–enable-mbregex  
–enable-wddx  
–enable-shmop  
–enable-soap  
PHP配置选项完整列表  
数据库选项  
–with-dbplus  
包括 dbplus 的支持。  
–with-adabas[=DIR]  
包括 Adabas D 的支持。DIR 是 Adabas 的基本安装目录，默认为 /usr/local。  
–with-sapdb[=DIR]  
包括 SAP DB 的支持。DIR 是 SAP DB 的基本安装目录，默认为 /usr/local。  
–with-solid[=DIR]  
包括 Solid 的支持。DIR 是 Solid 的基本安装目录，默认为 /usr/local/solid。  
–with-ibm-db2[=DIR]  
包括 IBM DB2 的支持。DIR 是 DB2 的基本安装目录，默认为 /home/db2inst1/sqllib。  
–with-empress[=DIR]  
包括 Empress 的支持。DIR 是 Empress 的基本安装目录，默认为 $EMPRESSPATH。自 PHP4 起，本选项仅支持 Empress 8.60 及以上版本。  
–with-empress-bcs[=DIR]  
包括 Empress Local Access 的支持。DIR 是 Empress 的基本安装目录，默认为 $EMPRESSPATH。自 PHP4 起，本选项仅支持 Empress 8.60 及以上版本。  
–with-birdstep[=DIR]  
包括 Birdstep 的支持。DIR 是 Birdstep 的基本安装目录，默认为 /usr/local/birdstep。  
–with-custom-odbc[=DIR]  
包 括用户自定义 ODBC 的支持。DIR 是 ODBC 的基本安装目录，默认为 /usr/local。要确认定义了 CUSTOM_ODBC_LIBS 并且在 include 目录中有某个 odbc.h。例如，对于 QNX 下的 Sybase SQL Anywhere 5.5.00，在运行 configure 脚本之前应该先定义以下环境变量： CPPFLAGS=”-DODBC_QNX -DSQLANY_BUG” LDFLAGS=-lunix CUSTOM_ODBC_LIBS=”-ldblib -lodbc”.  
–with-iodbc[=DIR]  
包括 iODBC 的支持。DIR 是 iODBC 的基本安装目录，默认为 /usr/local。  
–with-esoob[=DIR]  
包括 Easysoft OOB 的支持。DIR 是 OOB 的基本安装目录，默认为 /usr/local/easysoft/oob/client。  
–with-unixODBC[=DIR]  
包括 unixODBC 的支持。DIR 是 unixODBC 的基本安装目录，默认为 /usr/local。  
–with-openlink[=DIR]  
包括 OpenLink ODBC 的支持。DIR 是 OpenLink 的基本安装目录，默认为 /usr/local。这和 iODBC 一样。  
–with-dbmaker[=DIR]  
包括 DBMaker 的支持。DIR 是 DBMaker 的基本安装目录，默认为最新版 DBMaker 安装的目录（例如 /home/dbmaker/3.6）。  
–disable-unified-odbc  
取消对 unified ODBC 的支持。仅适用于激活了 iODBC，Adabas，Solid，Velocis 或用户自定义 ODBC 界面。仅能用于 PHP 3！  
图像选项  
–without-gd  
禁用 GD 支持。仅用于 PHP 3！  
–with-imagick  
Imagick 扩展被移到 PEAR 中的 PECL 中去了，可以在这里找到。PHP 4 中的安装指示可以在 PEAR 站点中找到。  
只用 –with-imagick 仅在 PHP 3 中支持，除非依照 PEAR 站点的指示去做。  
–with-ming[=DIR]  
包括 ming 支持。  
杂类选项  
–enable-force-cgi-redirect  
激活服务器内部重定向的安全检查。如果是在 Apache 中以 CGI 方式使用 PHP 则应该使用此选项。  
–enable-discard-path  
使用此选项可以使 PHP 的 CGI 可执行程序安全地放置在 web 目录树以外的地方，并且别人也不能绕过 .htaccess 的安全设置。  
–with-fastcgi  
将 PHP 编译成 FastCGI 应用程序。  
–enable-debug  
编译时加入调试符号。  
–with-layout=TYPE  
设置安装后的文件布局。TYPE 可以是 PHP（默认值）或者 GNU。  
–with-pear=DIR  
将 PEAR 安装在 DIR 目录中（默认为 PREFIX/lib/php）。  
–without-pear  
不安装 PEAR。  
–enable-sigchild  
激活 PHP 自己的 SIGCHLD 句柄。  
–disable-rpath  
禁止传递附加的运行时库搜索路径。  
–enable-libgcc  
激活显式 libgcc 连接。  
–enable-php-streams  
包含试验的 PHP 流。除非是测试源代码，否则不要使用！  
–with-zlib-dir=<DIR>;  
定义 zlib 的安装路径。  
–with-aspell[=DIR]  
包含 ASPELL 支持。  
–with-ccvs[=DIR]  
包含 CCVS 支持。  
–with-cybercash[=DIR]  
包含 CyberCash 支持。DIR 是 CyberCash MCK 的安装目录。  
–with-icap[=DIR]  
包含 ICAP 支持。  
–with-ircg-config  
ircg-config 脚本的路径。  
–with-ircg  
包含 ircg 支持。  
–enable-mailparse  
包含 mailparse 支持。  
–with-muscat[=DIR]  
包含 muscat 支持。  
–with-satellite[=DIR]  
激活通过 Satellite（试验性质）的 CORBA 支持。DIR 是 ORBit 的主目录。  
–enable-trans-sid  
激活透明的 session id 传播。  
–with-regex[=TYPE]  
使用系统 regex 库（不赞成）。  
–with-vpopmail[=DIR]  
包含 vpopmail 支持。  
–with-tsrm-pthreads  
使用 POSIX 线程（默认值）。  
–enable-shared[=PKGS]  
编译共享库 [default=yes]。  
–enable-static[=PKGS]  
编译静态库 [default=yes]。  
–enable-fast-install[=PKGS]  
为快速安装而优化 [default=yes]。  
–with-gnu-ld  
假定 C 编译器使用 GNU ld [default=no]。  
–disable-libtool-lock  
避免锁死（可能会破坏并行编译）。  
–with-pic  
尝试只使用 PIC/non-PIC 对象 [default=use both]。  
–enable-memory-limit  
编译时加入内存限制支持。  
–disable-url-fopen-wrapper  
禁止通过 URL 的 fopen wrapper，不能通过 HTTP 或 FTP 访问文件。  
–enable-versioning  
仅输出所需要的符号。更多信息见 INSTALL 文件。  
–with-imsp[=DIR]  
包含 IMSp 支持（DIR 是 IMSP 的 include 目录和 libimsp.a 目录）。仅用于 PHP 3！  
–with-mck[=DIR]  
包含 Cybercash MCK 支持。DIR 是 cybercash mck 编译目录，默认为 /usr/src/mck-3.2.0.3-linux。帮助见 extra/cyberlib。仅用于 PHP 3！  
–with-mod-dav=DIR  
包含通过 Apache 的 mod_dav 的 DAV 支持。DIR 是 mod_dav 的安装目录（仅用于 Apache 模块版本！）仅用于 PHP 3！  
–enable-debugger  
编译入远程调试函数。仅用于 PHP 3！  
–enable-versioning  
利用 Solaris 2.x 和 Linux 提供的版本控制与作用范围的优势。仅用于 PHP 3！  
PHP 选项  
–enable-maintainer-mode  
激活将编译规则和未使用的（以及一些混淆的）依赖文件放入临时安装中。  
–with-config-file-path=PATH  
设定 php.ini 所在的路径，默认为 PREFIX/lib。  
–enable-safe-mode  
默认激活安全模式。  
–with-exec-dir[=DIR]  
安全模式下只允许此目录下执行程序。默认为 /usr/local/php/bin。  
–enable-magic-quotes  
默认激活 magic quotes。  
–disable-short-tags  
默认禁止简写的 PHP 开始标记 <?。  
服务器选项  
–with-aolserver=DIR  
指定已安装的 AOLserver 的路径。  
–with-apxs[=FILE]  
编译共享 Apache 模块。FILE 是可选的 Apache 的 apxs 工具的路径，默认为 apxs。确保指定的 apxs 版本是安装后的文件而不是 Apache 源程序中包中的。  
–with-apache[=DIR]  
编译 Apache 模块。DIR 是 Apache 源程序的最高一级目录。默认为 /usr/local/apache。  
–with-mod_charset  
激活 mod_charset 中的传递表（Apache 中）。  
–with-apxs2[=FILE]  
编译共享的 Apache 2.0 模块。FILE 是可选的 Apache 的 apxs 工具的路径，默认为 apxs。  
–with-fhttpd[=DIR]  
编译 fhttpd 模块。DIR 是 fhttpd 的源代码路径，默认为 /usr/local/src/fhttpd。  
–with-isapi=DIR  
将 PHP 编译为 ISAPI 模块用于 Zeus。  
–with-nsapi=DIR  
指定已安装的 Netscape 服务器路径。  
–with-phttpd=DIR  
暂无信息。  
–with-pi3web=DIR  
将 PHP 编译为用于 Pi3Web 的模块。  
–with-roxen=DIR  
将 PHP 编译为一个 Pike 模块。DIR 是 Roxen 的根目录，通常为 /usr/local/roxen/server。  
–enable-roxen-zts  
编译 Roxen 模块，使用 Zend Thread Safety。  
–with-servlet[=DIR]  
包含 servlet 支持。DIR 是 JSDK 的基本安装目录。本 SAPI 需要 java 扩展必须被编译为共享的 dl。  
–with-thttpd=SRCDIR  
将 PHP 编译为 thttpd 模块。  
–with-tux=MODULEDIR