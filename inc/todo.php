	
<?php 
session_start();

//var_dump($_SESSION['listcontent']);

require('inc/head.php');
require('inc/connect.php');

if($_SESSION['loggedin'] == false AND $_SERVER['QUERY_STRING'] == 'app=todo'){
    header("location:index.php?app=login");
}




$todoitem = $_SESSION['list'] = $_POST['todoinput'];
$username = $_SESSION["username"];
$itemdone = NULL;
$itemindex = ($_SESSION['getnextindex']);






if($_POST['addactivity']){
//unset($_SESSION['getnextindex']);
    
$sql = "INSERT INTO todolist ( username , todoitem , itemdone , itemindex ) VALUES ( '$username' , ' $todoitem' , '$itemdone' , '$itemindex') ";

if($conn->query($sql)){
   // echo "Done";
}else{
    exit;
}
    
	header('location:index.php?app=todo');// TO STOP REFRESH FROM POSTING LAST POST		

}




$sql = "SELECT firstname , lastname FROM userprofile WHERE username = '$username' ";
$query = $conn->query($sql);
$result = $query->fetchAll(PDO::FETCH_ASSOC);

if($result){
    $welcome = $result[0]["firstname"]." ".$result[0]["lastname"];
    $firstname = $result[0]["firstname"];
}else{
    exit;
}




$sql = "SELECT todoitem FROM todolist WHERE username = '$username' ";
$query = $conn->query($sql);
$result = $query->fetchAll(PDO::FETCH_ASSOC);

if($result){
    //echo "I have your items";
    //print_r($result);
}else{
    $getstarted = [
        [
           "Hi ".$firstname. ", add an item to get started "
        ]
    ];
}










?>


























<!----------------HTML HTML HTML ---------------------------------------->



    <form method="POST" class="todoinputform">
			<input type="text" name="todoinput" id="todoinput" required placeholder="(e.g.) walk the dog...">
			<input type="submit" name="addactivity" value="Add activity" class="button" id="submit">
            <a href="index.php?action=delete-all" id="deleteall"><i class="fas fa-power-off" title="logout"></i></a>
	</form>

	<ul class="ul">

		
		
		<?php
		
     $_SESSION['getnextindex'] = COUNT($result);	
        
		foreach( $result as $listitem){
            foreach($listitem as $items){
                if($items != "")// SANITIZED HERE
                echo "<li><i class='fas fa-asterisk'></i>&nbsp;&nbsp;&nbsp;$items<i class='far fa-trash-alt todoicons'></i>&nbsp;&nbsp;<i class='far fa-window-close todoicons'></i>&nbsp;&nbsp;<i class='far fa-check-square todoicons'></i></li>";
            }
		}
        
        
		foreach( $getstarted as $listitem){
            foreach($listitem as $items){
                if($items != "")// SANITIZED HERE
                echo "<li><i class='fas fa-asterisk'></i>&nbsp;&nbsp;&nbsp;$items<span class='far fa-trash-alt todoicons'></span>&nbsp;&nbsp;<i class='far fa-window-close todoicons'></i>&nbsp;&nbsp;<i class='far fa-check-square todoicons'></i></li>";
            }
		}
		
		
		
		?>

		
	</ul>

    <div class="preupgrade">
        
        <span class="countstatus">complete</span>&nbsp;&nbsp;<span id='count1'>0</span>&nbsp;&nbsp;
        <span class="countstatus">in progress</span>&nbsp;&nbsp;<span id='count2'>0</span>&nbsp;&nbsp;
        <span class="countstatus">pending</span>&nbsp;&nbsp;<span id='count3'>0</span>&nbsp;&nbsp;
        <span class="usergreeting"><?php echo "Welcome ".$welcome ; ?></span>&nbsp;&nbsp;
     </div>
