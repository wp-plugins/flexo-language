<?php
/*
Plugin Name: flexo-language
Version: 1.0001
Plugin URI: http://www.flexostudio.com/wordpress-plugins-flexo-utils.html
Description: Add another language functionality, that is file based without compressions
Author: Grigor Grigorov, Mariela Stefanova, Flexo Studio Team

*/


class flexoLanguage {
	
	private static $_lang;
	private static $_DICT = array();


	public static function set_language($lang){
		self::$_lang = $lang;
	}
	
	public static function is_set_language(){
		return self::$_lang == '' ? false : true;
	}
	
	public static function add_dictionary( $path = ''){
		if(!self::is_set_language())return false;
		
		if($path == ''){
			$path = get_bloginfo('stylesheet_directory');
		}
		
		$l	=	self::current_language();
		$f	=	$path.'/lang_'.$l.".php";

		include $f;

		self::$_DICT[$l] = array_merge((array)self::$_DICT[$l] , (array)$__FL_DICT__);
	}

	public static function current_language(){
		return self::$_lang;
	}
	public static function _($key){
		$params	 	=	array();	
		$ret			=	"";
		$d				=	self::$_DICT;
		$l				=	self::current_language();
				
		if(self::is_set_language()){
			$ret = isset($d[$l][$key]) ? $d[$l][$key] : $key;
		}else{
			$ret	=	$key;
		}

		return 	$ret;
	}
}//class
?>