<?php
class Database {
	/**
	 * @var String
	 * @access protected
	 */
	public static $host = null;
	/**
	 * @var Mysqli object
	 * @access public
	 */  
	public static $user = null;
	/**
	 * @var String
	 * @access protected
	 */
	public static $password = null;
	/**
	 * @var String
	 * @access protected
	 */
	public static $dbname = null;
	static function getInstance() {
			$ini_array = parse_ini_file("/var/www/societymgmt/config.ini");
	        $host = $ini_array['host'];
	        $user = $ini_array['username'];
	        $password = $ini_array['password'];
	        $dbname = $ini_array['dbname'];
			return mysqli_connect($host, $user, $password, $dbname);
			//print_r($GLOBALS);
	}
}
?>
