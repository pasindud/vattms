<?php
/**
 * @Author Pasindu De Silva
 * @license  GNU Affero General Public License http://www.gnu.org/licenses/ 
 * @vatsim : 1165770
 * 
 *	This is the dashboard and the login page
 *	Using this INS will approve and add sessions details
 *  Students will request sessions
 *
 *	Pending tab contains session request but still not approved
 *	Previous tab contain past session details
 * Approved tab contains session approved but still not carried out and awaiting adding of session details
 */
 ?>

<?php include "base.php"; ?>
<html>  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>VAT LMS</title>
<?php include "header.php"; ?>

	<script src="js/jquery-1.8.2.js"></script>
     <script src="js/jquery-ui.js"></script>
	 <script src="js/jquery-ui.js"></script>
	 
	 <link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>
	 

	
    <style>
    #draggable { width: 150px; height: 150px; padding: 0.5em; }
    </style>

<script>
  $(document).ready(function() {
    $("#tabs").tabs();
	
				$("#mainmsgbox").hide();
			
			
      	 $("#mainmsgbox").click(function(){

				$("#mainmsgbox").slideUp("normal");
		});
	
  });

</script>



<style>
.overlayOuter{
    background:#000;
    opacity:0.92;
    display:none;
    height:100%;
    left:0;
    position:absolute;
    top:0;
    width:100%;
    z-index:100;
	height:100%;
 }
 /*
 .overlayOuter2{
    background:#000;
    opacity:0.92;
    display:none;
    height:100%;
    left:0;
    position:absolute;
    top:0;    margin: 0 auto;
    width:100%;
    z-index:101;
	height:100%;
 }*/
 .overlayOuter2{
		position: fixed; 
		height: 100%;
		width: 100%;
		background: #5E5D5E;
		opacity:0.60;
		z-index: 8000;
		display: none;
		top: 0;
		left: 0; cursor: pointer; 
 }


.overlayInner{
	opacity:0.99;
    position:absolute;   
	margin: 0 auto;

    width:500px;
    z-index:1010010;
	
	
	
 }

  .loadses{
	visibility: hidden;
	top: 100px; 
    width:auto;
	position:fixed;
	margin-left:40%;
	z-index: 9004;
	color:#000;
		padding: 14px;
    
    background-color: #EEE;
	border-radius: 5px;

 }
 .overlayInner2{
	visibility: hidden;
	top: 100px; 
    width:80%;
	margin-left:10%;


	position: absolute;
	z-index: 9001;

	color:#000;
	border-radius: 5px;

 }

 tr, td,th
{
border: 2px solid #000;
padding:4px;
background:#fff;
color:#000;
}
h1,h2,h3,p,a:hover,label{color:#000;}
 #msgbox{
 z-index: 9002;
background-color:#000;
border-color:#000;
color:#fff;
height:30px;
margin-bottom:8px;

}
 #mainmsgbox{
 z-index: 9002;
background-color:#F0A118;
border-color:#000;
color:#fff;
height:30px;
margin-bottom:8px;

}
</style>

</head>  

 
<body>  

	<!-- Following divs are used for popups --->
   <div class="overlayOuter2"> </div>
   <div class="overlayInner2"></div>
   <div class="loadses"></div>
  



<div id="main">

<div id="mainmsgbox" class="alert alert-info" style="cursor: pointer; " ><a style="text-align:left;"  id="msgbox">X   </a><span id="msg"></span></div>

<?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{

	 ?>
     

    <h1>Member Area</h1>
  	 <p>Wellcome to the<a href="logout.php"> Logout.</a>.</p>
      
	<br/>
		  <span>Your Username :        <?=$_SESSION['Username']?></span>
		 </br>
		 <span> Your Email Address : <?=$_SESSION['EmailAddress']?></span>
		  </br>
		 <span> Your Vatsim ID :          <?=$_SESSION['vatsimid']?></span>
		  </br>
		 <span> User ID :			 <?= $_SESSION['id'] ?></span>
		  </br>
		 <a href="#" id="loadnewses">Click here to add training session</a>
		 </br>

	<script>
	
	/*	The popup  for the request session*/
	$("a#selector").live("click", function(){
		$(".overlayInner").load($(this).attr('class')+".php", function(){$(".overlayOuter").fadeIn(300); })
	});
	

	
	/*  The Popup for viewing  reports*/
	$("#popreport").live("click", function(){
		$(".overlayInner2").load( "logpop.php?id="+$(this).attr('class'), function(){$(".overlayOuter2").fadeIn(300); })
		$('.overlayInner2').css({ 'visibility':'visible' });
	});
	
	// closing the popup
	$(".overlayOuter2").live("click", function(){
		$('.overlayInner2').css({ 'visibility':'hidden' });
		$('.loadses').css({ 'visibility':'hidden' });
		$(".overlayOuter2").fadeOut(300); 
	});	
	
	// Loading popup for approving a new session
	$("#approveses").live("click", function(){
		$(".overlayInner2").load( "approve.php?id="+$("#approveses").attr('class'), function(){
			$(".overlayOuter2").fadeIn(300); 
		})
			$('.overlayInner2').css({ 'visibility':'visible' });
	});

	// Loading the adding new sessions popup
	$("#loadnewses").live("click", function(){
		$(".loadses").load( "addses.php", function(){$(".overlayOuter2").fadeIn(300); })
		$('.loadses').css({ 'visibility':'visible' });
	});
	
	</script>
	

	
	
		<link type="text/css" href="css/Aristo/Aristo.css" rel="stylesheet" />
		<script>
			// Tabs
				$('#tabs').tabs();

		</script>
		  <br/>
	<h2 class="Header">Sessions</h2>
	    <br/>
		<div id="tabs">
			<ul>
				<li><a href="#tabs-1">Pending</a></li>
				<li><a href="#tabs-2">Previous</a></li>
				<li><a href="#tabs-3">Approved</a></li>
			</ul>


	    <?php
							include "sessions.php" ;
		?>
		</div>

    <?php
}
elseif(!empty($_POST['username']) && !empty($_POST['password']))
{
	 $username = mysql_real_escape_string($_POST['username']);
     $password = mysql_real_escape_string($_POST['password']);
    
	 $checklogin = mysql_query("SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$password."'");
    
    if(mysql_num_rows($checklogin) == 1)
    {
			
    	 $row = mysql_fetch_array($checklogin);
     
 
        $_SESSION['Username'] = $username;
        $_SESSION['EmailAddress'] = $row['EmailAddress'];
        $_SESSION['id'] = $row['UserID'];
        $_SESSION['LoggedIn'] = 1;
        $_SESSION['level'] =   $row['level'];
        $_SESSION['vatsimid'] =  $row['vatsimid'];

		
        
    	  echo "<h1>Success</h1>";
         echo "<p>We are now redirecting you to the member area.</p>";
         echo '<meta http-equiv="refresh" content="2" ; url="index.php" />';
	 	
		



    }
    else
    {
    	 echo "<h1>Error</h1>";
         echo "<p>Sorry, your account could not be found. Please <a href=\"index.php\">click here to try again</a>.</p>";
    }
}
else
{
	?>

   <h1>Member Login</h1>
    
   <p>Thanks for visiting! Please either login below, or <a href="register.php" style="color:#000;">click here to register</a>.</p>
    
	<form method="post" action="index.php" name="loginform" id="loginform">

		<label for="username">Username:</label><input type="text" name="username" id="username" /><br />
		<label for="password">Password:</label><input type="password" name="password" id="password" /><br />
		<input type="submit" name="login" id="login" value="Login" />

	</form>
    
   <?php
}
?>
</div>

</body>
</html>