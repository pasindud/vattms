<?php
/**
 * @Author Pasindu De Silav
 * @license  GNU Affero General Public License http://www.gnu.org/licenses/ 
 * 
 * 
 *		This is used to display details of a particular session
 */
 include "base.php"; 

if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{	 
$id = $_GET["id"];

									 $query = "SELECT * FROM  `log`  WHERE   `id`=".$id  ; 
									 $data= mysql_query($query) or die(mysql_error()); 
									 $info = mysql_fetch_array( $data); 
							
									// Select the Student's Name
									 $query2 = "SELECT * FROM  `users`  WHERE   `UserID`=".$info['studentid']	 ; 
									 $data2 = mysql_query($query2) or die(mysql_error()); 
								     $info2 = mysql_fetch_array( $data2 ); 
									 
									 
									// Select the Instructors Name
									 $query3 = "SELECT * FROM  `users`  WHERE   `UserID`=".$info['insid']	 ; 
									 $data3 = mysql_query($query3) or die(mysql_error()); 
									 $info3 = mysql_fetch_array( $data3 ); 

									 
							echo ' <div id="sec2">';
									echo "<h2>Detailed Training Report </h2>"      				; echo '<br/>';
									
											echo  "Session ID : ".		$info['id']					    ; echo '<br/>';
											echo  "Student ID : ".			$info['studentid']		   		; echo '<br/>';
											echo  " Student Name : ".	$info2['name']				; echo '<br/>';echo '<br/>';
											echo  "Instructor ID : ".		$info['insid']					; echo '<br/>';
											echo  "Instructor Name : ".	$info3['name']				; echo '<br/> <br/>';
											echo  "Instructor Report : " 						   			; echo '<br/>';
											echo $info['insreport']												; echo '<br/> <br/>';
											echo  "Session Date : ".		$info['date']					; echo '<br/>';
											echo  "Session Time : ".		$info['time']					; echo '<br/>';
											echo "Session Status : ". 	$info['status']					; echo '<br/>';
											echo  "Session Facility : ".	$info['facility']				 ; echo '<br/>';
											echo  "Session Reuqested Date : ".$info['req_date']	 ; echo '<br/>';
											
						echo ' </div>';

}

?>

