<?php



if($_GET['app'] == 'todo'){
$currentApp = "ToDoApp";
}elseif($_GET['app'] == 'alarm'){
$currentApp = "Alarm";	
}elseif($_GET['app'] == 'signup'){
$currentApp = "Signup";
}elseif($_GET['app'] == 'login'){
$currentApp ="Login";
}
	
require_once('inc/head.php');


if($_GET['action'] == 'delete-all' || $_GET['action'] == 'logout'){
    //require_once('inc/todo.php');
    session_destroy();
    header('location:index.php?app=todo');
    session_start();
    $_SESSION['loggedout'] = true;
    $_SESSION['loggedin'] = false;
}

if($_GET['action'] == 'alarm'){
    echo '<script>alert();</script>';
}/////////////////////////////////////////////ALARM ACTION HERE/////////========>>>>>>>>>>>>>


?>


		<body>
            
            
			<div class="wrapper">
 
                
							<?php if($currentApp == "ToDoApp" ){
	                              require_once('inc/todo.php'); 
                             } ?>
    
          <div class="main-container">		
              
              
              
              
              
              
			  
			  
			<div class="container" id="first-container">
					<header>
						<div class="main-header">
							<h1><i class="fas fa-tasks"></i><a href="index.php">TimeKeeper</a></h1>
                            
                            <?php if(!($currentApp == "ToDoApp")){?>
							<a href="index.php?app=signup"><p class="button"><i class="fas fa-user-plus"></i>&nbsp;Signup</p></a>&nbsp;&nbsp;&nbsp;
							<a href="index.php?app=login"><p class="button"><i class="fas fa-sign-in-alt"></i>&nbsp;Login</p></a>
                            
                            <?php }else{ ?>
                            
                            
 							<a href="index.php?action=logout"><p class="button"><i class="fas fa-power-off"></i>&nbsp;Logout</p></a>&nbsp;&nbsp;&nbsp;                           
                            <style> #first-container{ display: none; } </style>
                            <?php } ?>
						</div>
					</header>
			</div><!--container-->
		

              
              
              
              
              
              
              
              
              
		
			<div class="container" id="second-container">
						<div class="app-container"> <!--top part of the second container- about 80%-->
							<h3><?php echo $currentApp ?></h3>
							
							<div class="app">
                                
                                
                                
                                
							<?php if($currentApp == "ToDoApp" ){
	                              echo "<style> #second-container{ display:none; } .social{margin-left:3%;}</style>"; 
    
    
    
    
    
    
                            }elseif($currentApp == "Alarm"){
	                              require('inc/alarm.php');
    
    
    
    
    
    
                            }elseif($currentApp == "Signup" || $currentApp == "Login"){
                                  require("inc/users.php");
							
                            }elseif($currentApp == ''){
                                  echo "<div id='todosvgAnimation'></div>";
                                  echo "<script src='todosvg.js'></script>";
                            }
                                
                                
                                
                                
							?>	
							</div>

						</div>

			</div><!--container-->
			  
              
		</div><!--main-container-->
			
                <div class="social">
                    <span><i class="fab fa-twitter-square"></i><i class="fab fa-linkedin"></i><i class="fab fa-facebook-square"></i></span>
                </div>        
                
		</div><!--wrapper-->
			<?php echo '<script src="js/todo.js"></script>' ?>
		</body>
</html>