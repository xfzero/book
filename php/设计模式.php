设计模式：
设计模式是软件开发人员在软件开发过程中面临的一般问题的解决方案。这些解决方案是众多软件开发人员经过相当长的一段时间的试验和错误总结出来的。
设计模式是一套被反复使用的、多数人知晓的、经过分类编目的、代码设计经验的总结。使用设计模式是为了重用代码、让代码更容易被他人理解、保证代码可靠性。 毫无疑问，设计模式于己于他人于系统都是多赢的，设计模式使代码编制真正工程化，设计模式是软件工程的基石，如同大厦的一块块砖石一样。项目中合理地运用设计模式可以完美地解决很多问题，每种模式在现实中都有相应的原理来与之对应，每种模式都描述了一个在我们周围不断重复发生的问题，以及该问题的核心解决方案，这也是设计模式能被广泛应用的原因。





1：工厂模式：
工厂模式是我们最常用的实例化对象模式，是用工厂方法代替new操作的一种模式。

使用工厂模式的好处是，如果你想要更改所实例化的类名等，则只需更改该工厂方法内容即可，不需逐一寻找代码中具体实例化的地方（new处）修改了。为系统结构提供灵活的动态扩展机制，减少了耦合。

<?php
	class Database{

	}

	class Factory{
		static function createDatabase(){
			$db = new Database();
			return $db;
		}
	}
	//以后即使Database类改了名字，这里也不需要改动，只需要修改工厂类中的方法
	$db= new Factory::createDatabase();
?>


2：单例模式（单态模式）
最适合php使用这种设计模式

单例模式确保某个类只有一个实例，而且自行实例化并向整个系统提供这个实例。

单例模式是一种常见的设计模式，在计算机系统中，线程池、缓存、日志对象、对话框、打印机、数据库操作、显卡的驱动程序常被设计成单例。

单例模式分3种：懒汉式单例、饿汉式单例、登记式单例。

单例模式有以下3个特点：
1．只能有一个实例。
2．必须自行创建这个实例。
3．必须给其他对象提供这一实例。

那么为什么要使用PHP单例模式？
PHP一个主要应用场合就是应用程序与数据库打交道的场景，在一个应用中会存在大量的数据库操作，针对数据库句柄连接数据库的行为，使用单例模式可以避免大量的new操作。因为每一次new操作都会消耗系统和内存的资源。

如果想让一个类，只能有一个对象，就要让这个类不能创建对象，将构造方法private
可以在类的内存使用一个静态方法，来创建对象
<?php
	class Database{
		protected static $db;

		//私有构造方法，让这个类在外面不能被实例化
		private function __construct(){
		
		}

		static function getInstance(){
			if(self::$db){
				return self::$db;
			}
			self::$db=new self();
			return $db;
		}

		function __destruct(){
			echo '销毁对象';
		}
	}
	//调用两次，只销毁一次对象，说明之创建了一个实例对象
	$db=Database::getInstance();
	$db=Database::getInstance();
?>


3：注册树模式
注册模式，解决全局共享和交换对象。已经创建好的对象，挂在到某个全局可以使用的数组上，在需要使用的时候，直接从该数组上获取即可。将对象注册到全局的树上。任何地方直接去访问。

<?php 
	class Register{
	    protected static  $objects;

        static function set($alias,$object){//将对象注册到全局的树上
            self::$objects[$alias]=$object;//将对象放到树上
        }
        static function get($name){
        	return self::$objects[$name];//获取某个注册到树上的对象
    	}
	    function _unset($alias){
	        unset(self::$objects[$alias]);//移除某个注册到树上的对象。
	    }
	}

	class Database{
		protected static $db;

		//私有构造方法，让这个类在外面不能被实例化
		private function __construct(){
		
		}

		static function getInstance(){
			if(self::$db){
				return self::$db;
			}
			self::$db=new self();
			return self::$db;
		}

		function __destruct(){
			echo '销毁对象';
		}
	}

	//工厂方法只需要构造一次（比如环境初始化时），其他地方再使用时 不需要调用工厂方法，也不需要单例模式获取这个模式，直接在注册器上去拿这个对象就可以了
	class Factory{
		static function createDatabase(){
			$db=Database::getInstance();
			Register::set('db1',$db);
			return $db;
		}
	}

	$db=Register::get('db1');
?>


4：适配器模式
将各种截然不同的函数接口封装成统一的API。 
PHP中的数据库操作有MySQL,MySQLi,PDO三种，可以用适配器模式统一成一致，使不同的数据库操作，统一成一样的API。类似的场景还有cache适配器，可以将memcache,redis,file,apc等不同的缓存函数，统一成一致。 
首先定义一个接口(有几个方法，以及相应的参数)。然后，有几种不同的情况，就写几个类实现该接口。将完成相似功能的函数，统一成一致的方法。

<?php
namespace IMooc;
interface IDatabase
{
    function connect($host, $user, $passwd, $dbname);
    function query($sql);
    function close();
}

namespace IMooc\Database;
use IMooc\IDatabase;
class MySQL implements IDatabase
{
    protected $conn;
    function connect($host, $user, $passwd, $dbname){
        $conn = mysql_connect($host, $user, $passwd);
        mysql_select_db($dbname, $conn);
        $this->conn = $conn;
	}
    function query($sql){
            $res = mysql_query($sql, $this->conn);
            return $res;
    }
    function close(){
        mysql_close($this->conn);
    }
}

namespace IMooc\Database;
use IMooc\IDatabase;
class MySQLi implements IDatabase
{
    protected $conn;
    function connect($host, $user, $passwd, $dbname){
        $conn = mysqli_connect($host, $user, $passwd, $dbname);
        $this->conn = $conn;
    }
    function query($sql){
        return mysqli_query($this->conn, $sql);
    }
    function close(){
        mysqli_close($this->conn);
    }
}

namespace IMooc\Database;
use IMooc\IDatabase;
class PDO implements IDatabase{
	protected $conn;
	function connect($host, $user, $passwd, $dbname){
	    new \PDO("mysql:host=$host;dbname=$dbname",$user,$passwd);
	    $this->conn = $conn;
	}

	function query(){
		return $this->conn->query($sql);
	}

	function close(){
		unset($this->conn);
	}
}

//$db = new IMooc\IDatabase\MySQLi();
$db = new IMooc\IDatabase\PDO();//可以根据环境（与没有mysqli）进行适配
$db->connect('127.0.0.1','root','root','test');
$db->query("show database");
$db->close();
?>


5：策略模式
策略模式，将一组特定的行为和算法封装成类，以适应某些特定的上下文环境，这种模式就是策略模式

策略模式是对象的行为模式，用意是对一组算法的封装。动态的选择需要的算法并使用。

策略模式指的是程序中涉及决策控制的一种模式。策略模式功能非常强大，因为这个设计模式本身的核心思想就是面向对象编程的多形性思想。

策略模式的三个角色：
1．抽象策略角色
2．具体策略角色
3．环境角色（对抽象策略角色的引用）

实现步骤：
1．定义抽象角色类（定义好各个实现的共同抽象方法）
2．定义具体策略类（具体实现父类的共同方法）
3．定义环境角色类（私有化申明抽象角色变量，重载构造方法，执行抽象方法）

就在编程领域之外，有许多例子是关于策略模式的。例如：
如果我需要在早晨从家里出发去上班，我可以有几个策略考虑：我可以乘坐地铁，乘坐公交车，走路或其它的途径。每个策略可以得到相同的结果，但是使用了不同的资源。
假如一个电商网站系统，针对男女性用户要各自跳转到不同的商品类目，并且所有广告位展示不同的广告

<?php 
	namespace IMooc;
	interface UserStrategy{
		function showAd();
		function showCategory();
	}

	namespace IMooc;
	class FemaleUserStrategy implements UserStrategy{
		function showAd(){
			 echo "2018新款女装";
		}
		function showCategory(){
			echo "女装";
		}
	}

	namespace IMooc;
	class ManUserStrategy implements UserStrategy{
		function showAd(){
			 echo "Iphone";
		}
		function showCategory(){
			echo "电子产品";
		}
	}

	class Page{
		//传统的做法
		/*function index(){
			if(isset($_GET['female']){

			}else{

			}
		}*/

		protected $stragegy;
		function index(){
			echo "AD:";
			$This->stragegy->showAd();
			echo "<br/>";

			echo "Category:";
			$this->stragegy->showCategory();
			echo "<br/>";
		}
		function setStragegy(\IMooc\UserStrategy $stragegy){
			$this->stragegy=$stragegy;
		}
	}
	$page = new Page();
	if($_GET['female']){
		$stragegy = new \IMooc\FemaleUserStrategy();
	}else{
		$stragegy = new \IMooc\ManUserStrategy();
	}
	$page->setStragegy($stragegy);
	$page->index();
	//page类中不需要判断，实现解耦
?>


6：观察者模式
1：观察者模式(Observer)，当一个对象状态发生变化时，依赖它的对象全部会收到通知，并自动更新。 
2：场景:一个事件发生后，要执行一连串更新操作。传统的编程方式，就是在事件的代码之后直接加入处理的逻辑。当更新的逻辑增多之后，代码会变得难以维护。这种方式是耦合的，侵入式的，增加新的逻辑需要修改事件的主体代码。 
3：观察者模式实现了低耦合，非侵入式的通知与更新机制。

<?php
//传统的方式
class Event extends EventGenerator{
    function triger(){
        echo "Event<br>";

        //update,这里
        echo '传统的方式这里增加逻辑1';
        echo '传统的方式这里增加逻辑2';
    }
} 

$event = new Event();
$event->trigger();


EventGenerator.php
<?php
require_once 'Loader.php';
abstract class EventGenerator{
    private $observers = array();

    function addObserver(Observer $observer){
        $this->observers[]=$observer;
    }
    function notify(){
        foreach ($this->observers as $observer){
            $observer->update();
        }
    }
}

Observer.php
<?php
require_once 'Loader.php';
interface Observer{
    function update();//这里就是在事件发生后要执行的逻辑
}
//一个实现了EventGenerator抽象类的类，用于具体定义某个发生的事件

require 'Loader.php';
class Event extends EventGenerator{
    function triger(){
        echo "Event<br>";
    }
}
class Observer1 implements Observer{
    function update(){
        echo "逻辑1<br>";
    }
}
class Observer2 implements Observer{
    function update(){
        echo "逻辑2<br>";
    }
}
$event = new Event();
$event->addObserver(new Observer1());
$event->addObserver(new Observer2());
$event->triger();
$event->notify();
?>