<?php
	function fConnect(){
		$vHost="xxxxxxxxxxx";
		$vPort="xxxx";
		$vDbname="xxxxxxxxxxx";
		$vUser="xxxxxxxxx";
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