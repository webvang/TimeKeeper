<?php
session_start();


    

$conn = new PDOConnect('b59b5a37513c8b' , '2c6935ff' , 'us-cdbr-iron-east-02.cleardb.net' , 'heroku_bcd74fb2c06bd97');
$conn = $conn->conn;

$username = $_SESSION['username'];
$listIndex = $_SESSION['listindex'] = $_GET['listindex']; /////INDEX FROM JAVASCRIPT TWEAK



if($username){
    

$sql = "UPDATE todolist SET itemindex = '$listIndex' , itemdone = 'false'  WHERE username = '$username'  AND itemindex = '$listIndex' ";

if($conn->query($sql)){
    echo "AJAX SUCCESS";
    header("location:../index.php?app=todo");
}else{
    echo "AJAX NOT RECEIVED";
    exit;
}

}













?>




<?php

class PDOConnect
{
    public $username , $password , $servername , $database , $conn;
    
    function __construct($uname , $pword , $sname , $dbase){
        $this->username = $uname;
        $this->password = $pword;
        $this->servername = $sname;
        $this->database = $dbase;
        
        
        try{
            
            
            
        $this->conn = new PDO("mysql:host=$this->servername; dbname=$this->database", $this->username , $this->password);
            
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected Successfully";
            
            
            
        }catch(PDOException $e ){
            
           //echo "Not connected   ".$e->getMessage(); 
            
        }
    }

}




?>





