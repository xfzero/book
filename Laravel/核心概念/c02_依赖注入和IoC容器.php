<?php
/*
依赖注入：
注册完成后需要通知用户,可以通过短信、邮件等方式，
为了让Register类不过度依赖底层(Email/SsmMail)，而让其依赖于接口(Mail)
实例化Register类时将Mail类型的对象注入其中
*/
//定义规则，契约接口
interface Mail{
	public function send(array $target);
}

//发送邮件
class EMail implements Mail{
	public function send(array $target){
		//...
		echo 'send email success';
	}
}

//发送短信
class SmsMail implements Mail{
	public function send(array $target){
		//...
		echo 'success sms success';
	}
}

//注册
class Register{
	private $mail_num=array();

	private $mailObj;

	public function __construct(Mail $_mailObj){
		$this->mailObj = $_mailObj;
	}

	public function doRegister(){
		//...
		$this->mailObj->send($this->mail_num);
	}
}


$mail = new EMail();
//$mail = new SmsMail();
$reg = new Register($mail);

$reg->doRegister();

//------------

