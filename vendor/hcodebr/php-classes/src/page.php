<?php

namespace Hcode;

use Rain\tpl;

class page {

	private $tpl;
	private $options = [];
	private $defaults = [
		"data"=>[]

	];

	public function __construct($opts = array()){
		// config
		
		$this->options = array_merge($this->defaults, $opts);

		$config = array(
				
				"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/views/",
				"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
				"debug"   		=> false
		);

		Tpl::configure( $config );
	
		$this->tpl = new tpl;

		$this->setData($this->options["data"]);

		$this->tpl->draw("header");

	}

	public function setData($data = array())
	{
		foreach ($data as $key => $value) {
			# code...
			$this->tpl->assign($key, $value);
		}
	}

	public function setTpl($name,$data = array(), $returnHTML = false)
	{
		
		$this->setData($data);

		return $this->tpl->draw($name,$returnHTML);

	}
	

	public function __destruct(){
		
		$this->tpl->draw("footer");
	}


}