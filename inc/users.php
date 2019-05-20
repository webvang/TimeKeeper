<?php session_start() ;


//session_destroy();

?>



<?php require("connect.php"); ?>



<?php if($currentApp == "Signup"){ ?>

<?php
session_start();
//session_destroy();                                  
////////////////////////SIGN UP CODE///////////////
$username = "";
$password = "";
$email = "";
$error = array();                                 
                                  
                                  
                                  
if($_POST["signup"]){

$firstname = $_SESSION["firstname"] = $_POST['firstname'];
$lastname = $_SESSION["lastname"] = $_POST['lastname'];
$phone = $_SESSION["phone"] = $_POST['phone'];
$dob = $_SESSION["dob"] = $_POST['dob'];
    
    
    
    
    
$username = $_SESSION["username"] = $_POST['username'];
$email = $_SESSION["email"] =  $_POST['email'];
$password = $_POST['password'];
$confirm_password  = $_POST['confirm_password'];

if(empty($username)){ array_push($error, "Username is empty") ; }
if(empty($email)){ array_push($error, "Email is empty") ; }
if(empty($password)){ array_push($error, "Password is empty") ; }
if( $password !== $confirm_password )     { array_push($error, "Password does not match") ; }    

    
//var_dump($error); 
$sql = "SELECT  COUNT(username) AS username ,  COUNT(email) AS email FROM users WHERE username = '$username' OR email = '$email' ";
    
 $query = $conn->query($sql);   
 $result = $query->fetchAll(PDO::FETCH_ASSOC);
 //var_dump($result);
    
    
    
    
 if($result){
     
     if($result[0]["username"] > 0 OR $result[0]["email"] > 0){
         
         //echo "User Exists";
         array_push($error, "User Exists");
     }else{
         //echo "User Available";
         
     }
 }
    
    
if(COUNT($error) === 0  OR  $result[0]["username"] === 0  OR  $result[0]["username"] === 0 ){
   
  $sql = "INSERT INTO users ( username , email , password ) VALUES ( '$username' , '$email' , '$password' ) ";
  
  if($conn->query( $sql )){
     //echo "USER ADDED";
      
   $sql = "INSERT INTO userprofile ( firstname , lastname , email , username ,  phone, dob ) VALUES ( '$firstname' , '$lastname' , '$email' , '$username' ,'$phone' ,'$dob') ";
   
      if($conn->query( $sql )){

          header("location:index.php?app=login");
          session_start();
          $_SESSION["signedup"] = true;
          
       }
      
      

  }else{
  	//echo "USER NOT ADDED";
  }
    
    
    
}else{
    
    foreach($error as $err){
       echo "<i class='errors'>".$err."</i>"; 
    }
    
    
}     
    
    
    
    
    
}                                



















?>




    
<table id="signuptable">
    
    <form method="POST">
    
    <tr>
        <th><label for="firstname">Firstname *</label></th>
        <th><label for="lastname">Lastname *</label></th>
    </tr>
        
        
    <tr>
        <td><input type="text" name="firstname" id="firstname" required value="<?php echo $_SESSION['firstname']; ?>"></td>
        <td><input type="text" name="lastname" id="lastname" required  value="<?php echo $_SESSION['lastname']; ?>"></td>
    </tr>
        
        
    <tr>
        <th><label for="email">Email *</label></th>
        <th><label for="phone">Phone *</label></th>
    </tr>
        
        
    <tr>
        <td><input type="email" name="email" id="email" required  value="<?php echo $_SESSION['email']; ?>"></td>
        <td><input type="number" name="phone" id="phone" required  value="<?php echo $_SESSION['phone']; ?>"></td>
    </tr>
        
        
    <tr>
        <th><label for="dob">DOB (opt)</label></th>
        <th><label for="username">Username *</label></th>
    </tr>
        
        
    <tr>
        <td><input type="date" name="dob" id="dob" value="<?php echo $_SESSION['dob']; ?>"></td>
        <td><input type="text" name="username" id="username" required  value="<?php echo $_SESSION['username']; ?>"></td>
    </tr>
        
        
    <tr>
        <th><label for="password">Password *</label></th>
        <th><label for="confirm_password">Confirm password *</label></th>
    </tr>
        
        
    <tr>
        <td><input type="password" name="password" id="password" required ></td>
        <td><input type="password" name="confirm_password" id="confirm_password" required ></td>
    </tr>
     
     <tr>
        <td><input type="submit" name="signup" value="Signup"></td>
    </tr>       
        
    </form>
</table>  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<?php }elseif( $currentApp == "Login" ){ ?>

<?php
    

    
    
    

if($_POST["login"]){
session_start();
//session_destroy();                                  
////////////////////////SIGN UP CODE///////////////
$username = "";
$password = "";
$error = array(); 
    

$username = $_SESSION["username"] = $_POST["username"];
$password = $_SESSION["password"] = $_POST["password"];    
$error = array();   
    
if(empty($username)){ array_push($error, "Username is empty") ; }
if(empty($password)){ array_push($error, "Password is empty") ; }
   
if( COUNT($error) == 0 ){
    
    $sql = "SELECT username , password FROM users WHERE username='$username' AND password='$password'";
    
    
     $query = $conn->query($sql);   
     $result = $query->fetchAll(PDO::FETCH_ASSOC);
     
    
     if($result[0]["username"] == $username AND $result[0]["password"] == $password AND $_SESSION["loggedout"] == false){
         $_SESSION["loggedin"] = true;
     }else{
         echo "<span class='errors'>Invalid Credential</span>";
     }
    
    
}else{
    
    foreach($error as $err){
       echo "<i class='errors'>".$err."</i>"; 
    }
    
    
} 
    

}


if($_SESSION["signedup"] == true){
   echo "<span class='thanks'>"."Thanks for signing up . You can now login"."</span>"; 
   $_SESSION['signedup'] = false;
}
    
if($_SESSION["loggedout"] == true){
   echo "<span class='logoutsuccessmessage'>"."Logout Successful."."</span>"; 
   $_SESSION['loggedout'] = false;
}

?>


   
<table id="signuptable">
    
    <form method="POST">
    
    <tr>
        <th><label for="username">Username *</label></th>
        <th><label for="password">Password *</label></th>
    </tr>
        
        
    <tr>
        <td><input type="text" name="username" id="username" required ></td>
        <td><input type="password" name="password" id="password" required ></td>
    </tr>
     
     <tr>
        <td><input type="submit" name="login" value="Login"></td>
    </tr>       
        
    </form>
</table>    
    
    
    
    
    
    
    
    
    
    
    
    
    
<?php } ?>

<?php

if( isset($_SESSION["loggedin"]) AND $_SESSION["loggedin"] === true ){
    header("location:index.php?app=todo");
}


//session_destroy();
?>

