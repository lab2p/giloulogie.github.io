<?php

session_start();

$options = array(

  	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'

);

$bdd = new PDO('mysql:host=sql2.freemysqlhosting.net;dbname=sql2262056', 'sql2262056', 'uX3*aM2*', $options);

?>