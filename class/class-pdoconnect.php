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
            
            
            
        $this->conn = new PDO("mysqli:host=$this->servername; dbname=$this->database", $this->username , $this->password);
            
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected Successfully";
            
            
            
        }catch(PDOException $e ){
            
           //echo "Not connected   ".$e->getMessage(); 
            
        }
    }

}




?>