<?php
session_start();


    

$conn = new PDOConnect('root' , 'root' , 'localhost' , 'todoapp');
$conn = $conn->conn;

$username = $_SESSION['username'];




    

$sql = "SELECT itemindex FROM todolist WHERE itemdone = 'false' AND username = '$username' ";
$query = $conn->query($sql);
$result = $query->fetchAll(PDO::FETCH_ASSOC);
if($result){
    
    echo json_encode($result);
    //header("location:../index.php?app=todo");
}else{
    
    echo "NOT DONE";
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





