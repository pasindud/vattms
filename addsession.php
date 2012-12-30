
<?php

/**
 * @Author Pasindu De Silav
 * @license  GNU Affero General Public License http://www.gnu.org/licenses/ 
 *
 * 
 *	 This add the request session details to the database
 * 	
 */

include 'base.php';
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{	 


	$dis = trim($_POST["dis"]);
	$date = trim($_POST["date"]);
	$time = trim($_POST["time"]);
	$facility = trim($_POST["facility"]);
	
	$id="NULL";
	$insname="N";
	$insreport="S";
	$userid3="1";
	$status="1";
	
	$reg_query="INSERT INTO `log` (`id`, `insid`, `insreport`, `studentid`, `date`, `time`, `facility`, `status`, `req_date`) VALUES (NULL,NULL, NULL, '".$_SESSION['id']." ', ' ".$date." ', ' ".$time." ' , ' ".$facility." ', ' ".$status." ' , CURRENT_TIMESTAMP) ";
	$ext_query = mysql_query($reg_query) or die(mysql_error(   ) ); 

    	echo "1";
}else{
echo "2";}
?>		