<?php

//////MAKE A PDO CONNECTION WITH PREDEFINED CLASS/////////


require("class/class-pdoconnect.php");

$conn = new PDOConnect('b59b5a37513c8b' , '2c6935ff' , 'us-cdbr-iron-east-02.cleardb.net' , 'heroku_bcd74fb2c06bd97');
$conn = $conn->conn;



$sql = "CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1";


$conn->query($sql);


$sql = "CREATE TABLE IF NOT EXISTS `userprofile` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

$conn->query($sql);



$sql = "CREATE TABLE IF NOT EXISTS `todolist` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(100) NOT NULL,
  `todoitem` varchar(255) NOT NULL,
  `itemdone` varchar(100) NOT NULL,
  `itemindex` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

$conn->query($sql);


?>