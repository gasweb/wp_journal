<?php
namespace Magazine;

class PageMetaInfo
{    
	private static $title;

    public static function getTitle()
    {
    	return self::$title;
    }

    public static function setTitle($title)
    {
    	self::$title = $title;
    }
}
