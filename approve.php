<?php
/**
 * @Author Pasindu De Silva
 * @license  GNU Affero General Public License http://www.gnu.org/licenses/ 
 * 
 * 
 *		This will popup when a instructor approves a session request
 */
 
 ?>
 
<?php include "base.php"; ?>
<?php include "header.php"; ?>
<?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{	 
$id = trim(mysql_real_escape_string($_GET["id"]));

									 $query2 = "SELECT * FROM  `users`  WHERE   `vatsimid`=". $_SESSION['vatsimid'] 	 ; 
									 $datagg2 = mysql_query($query2) or die(mysql_error()); 
								     $info3 = mysql_fetch_array( $datagg2 ); 

									 $data2="UPDATE `log` SET `insid` = ' " .$info3['UserID'] ." ',`status` = '2' WHERE `log`.`id` =".$id ;
									 $datagg1= mysql_query($data2) or die(mysql_error()); 

									 $query = "SELECT * FROM  `log`  WHERE   `id`=".$id  ; 
									 $datagg = mysql_query($query) or die(mysql_error()); 
									 $info = mysql_fetch_array( $datagg ); 
							
									 $query2 = "SELECT * FROM  `users`  WHERE   `vatsimid`=".$info['studentid']	 ; 
									 $datagg2 = mysql_query($query2) or die(mysql_error()); 
								     $info2 = mysql_fetch_array( $datagg2 ); 


							echo ' <div id="sec2">';
									echo "<h2>Approved Session Details".$info3['UserID'] ."  ".$_SESSION['vatsimid'] ."</h2>"      ; echo '<br/>';
									
										echo '<p>Instructor '.$info3['name'].' Has Accepted the Session</p>'       ; echo '<br/>';
									
											echo  "Session ID : ".$info['id']					    ; echo '<br/>';

											echo  "Student ID : ".$info['studentid']		    ; echo '<br/>';
											echo  " Student Name : ".$info2['name']		; echo '<br/>';echo '<br/>';

											echo  "Instructor ID : ".$info['insid']				; echo '<br/>';
											echo  "Instructor Name : ".$info3['name']	; echo '<br/> <br/>';
											
											echo  "Session Date : ".$info['date']									 ; echo '<br/>';
											echo  "Session Time : ".$info['time']						  		 ; echo '<br/>';
											echo "Session Status : ". $info['status']						     ; echo '<br/>';
											echo  "Session Facility : ".$info['facility']						     ; echo '<br/>';
											echo  "Session Reuqested Date : ".$info['req_date']	 ; echo '<br/>';
							echo ' </div>';

}

?>

