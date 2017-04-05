<?php
namespace Magazine;

class PageHeader
{
	private static $instance;

	private function __construct($data="OOOOOPS!!")
	{
		$this->title = $data;
	}

	public static function getInstance()
	{
	  if ( is_null( self::$instance ) )
	  {
	    self::$instance = new self();
	  }
	  return self::$instance;
	}

}