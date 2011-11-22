=== flexo-language ===

Plugin Name: flexo-language
Contributors: flexostudio
Tags:language, translation
Author: Grigor Grigorov, Mariela Stefanova, Flexo Studio Team
Plugin URI: http://www.flexostudio.com/wordpress-plugins-flexo-utils.html
Description:Add another language functionality, that is file based without compressions
Version: 1.0001 
Stable tag:1.0001
Requires at least:3.0.5
Tested up to: 3.0.5


Add another language functionality, that is file based without compressions
see: http://www.flexostudio.com/
== Description ==

It allow the user to translate static texts as the example:
echo _l('cat');

see http://www.flexostudio.com/


== Installation ==

1.	Download.
2.	Unzip.
3.	Upload to the plugins directory.
4.	Activate the plugin.
5.	Have a nice work.


== How to use ==
need to make php file that is located inside the theme, it must be said lang_ (languages ??which will translate as lang_en.php)
 and contains the following code:

<?php

$__FL_DICT__ = array(

       'cat' => 'Katze',
       'dog' =>	'Hund',
	.............
);

?>
where 'cat' => 'Katze' 'regulations is a word and its translation.

in function.php to add the code:

if(class_exists('flexoLanguage')){
	$f	=	dirname(__FILE__);
	
	if(!flexoLanguage::is_set_language())
		flexoLanguage::set_language('en');//selected language
		
	flexoLanguage::add_dictionary($f);
	
	function _l($key){
		return flexoLanguage::_($key);
	}
}else{
	function _l($key){return $key;}
}



and everywhere in the code where you write words you want to have a translation in another language and place:
_l('cat');


== Screenshots ==

