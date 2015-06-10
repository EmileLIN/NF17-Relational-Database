<?php
	function fConnect(){
		$vHost="xxxxxxxx";
		$vPort="xxxxxxx";
		$vDbname="xxxxxxxxx";
		$vUser="xxxxxxxx";
		$vPassword="xxxxxxxx";
		$vConn = pg_connect("host=$vHost port=$vPort dbname=$vDbname user=$vUser password=$vPassword");
		if($vConn != FALSE)
		{
			return $vConn;
		}
		else
		{
			echo "ERROR:La base de donnnee ne peut pas etre connecte<br>";	
		}
	}
?>