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
							<img src="image/codespace.svg" width="150px"><br>
							<h1><i class="fas fa-tasks"></i><a href="index.php">TimeKeeper</a><b>Desktop</b></h1>
                            
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
               <!-- <div class="app2-container">
                    <span>Alarm</span>
                    <select class="select" id="select1">
                        
                            <option>setHour</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                        
                    </select>
                    
                    <select class="select" id="select2">
                        
                            <option>setMinutes</option>
                            <option value="00">00</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>                        
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>                        
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>                        
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="45">45</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>                        
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                            <option value="60">60</option>

                        
                    </select>&nbsp;&nbsp;
                    <i class="fas fa-play" id='setalarm'></i>
                    
                    <audio id="alarm1">
                        <source src="sound/alarm1.mp3" type="audio/mp3">
                    </audio>
                    
                </div>-->

                  
			</div><!--container-->
			  
              
		</div><!--main-container-->
			
                <div class="social">
                    <span><i class="fab fa-twitter-square"></i><i class="fab fa-linkedin"></i><i class="fab fa-facebook-square"></i></span>
                </div>        
                
		</div><!--wrapper-->
			<?php echo '<script src="js/todo.js"></script>' ?>
		</body>
</html>