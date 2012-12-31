
 <?php 
/**
 * @Author Pasindu De Silva
 * @license  GNU Affero General Public License http://www.gnu.org/licenses/ 

 * 
 *		This class contains methodes to load the data to the dash board
 */ 
 
	class MyClass  
    {  
	
	
		public function WriteLog($logStream){ // This loges all events happening in the system
				$_LOGFILE = 'LogData.log';
		
				$file = fopen($_LOGFILE, 'a');
				fwrite($file, '['.date('D M j G:i:s T Y').'] '.$logStream.'\n');
				fclose($file);
		}
	
			public function ins_pen_tab()	// Loading Instructor pending  tab
			{
			
						$query = "SELECT * FROM log Where status=1 "; 
						
								echo "<p><b>All Pending Training Session </b></p>";
									echo "<br />";
									
						$result = mysql_query($query) or die(mysql_error());
						
						while($row = mysql_fetch_array($result))
									{
									
											$query = "SELECT * FROM users Where UserID=".$row['studentid']; 
											
											$stuname = mysql_query($query) ;
											$info = mysql_fetch_array( $stuname ); 
											
											
										echo '<tr >'	;
										echo " <td>". $row['id'] ."</td>";
										echo " <td>". $info['name'] ."</td>";
										echo " <td>". $row['date'] ."</td>";
										echo " <td>". $row['time'] ."</td>";
										echo " <td>". $row['facility']   ."</td>";
										echo " <td> <a id='approveses' class='".$row['id'] ."' style='cursor: pointer; '>Approve session</a></td>";
											
										echo "</tr>"	;
										
									}
									
				}
			
			public function ins_pre_tab()	// Loading Instructor Previous tab 
			{
						
					echo "<p><b>Previous Sessions History</b></p>";
									echo "<br />";
									
										$query = "SELECT * FROM log Where status=0 "; 
									 
									$result = mysql_query($query) or die(mysql_error());

									
									while($row = mysql_fetch_array($result))
									{
											$query = "SELECT * FROM users Where UserID =".$row['studentid']; 
											
											$stuname = mysql_query($query) ;
											$info = mysql_fetch_array( $stuname ); 
											
											$query1 = "SELECT * FROM users Where UserID =".$row['insid']; 
											
											$stuname1 = mysql_query($query1) ;
											$info1 = mysql_fetch_array( $stuname1 ); 
										
										echo '<tr>'	;
										echo " <td>". $row['id'] ."</td>";
										echo " <td>". $info['name'] ."</td>";
										
										echo " <td>". $row['time'] ."</td>";
										echo " <td>". $row['date'] ."</td>";	
										echo " <td>". $row['facility']   ."</td>";
										echo " <td>". $info1['name']   ."</td>";
										
										
									
										
									//	 echo ' <div class=q'.$row['id'].' id="popreport" >';
											
										//$_GET['id']=$row['id'];
											
										//include('logpop.php');			

									  //  echo '<a class="close-reveal-modal"></a></div>';
									echo '<td>  <a href="#" class='.$row['id'].' id="popreport" >View Report</a> </td>' ;

										echo "</tr>"	;
										
										
									}				
			}
			
			public function ins_app_tab()	// Loading Instructor Approved tab 
			{
							echo "<p><b>Approved Sessions </b></p>";
									echo "<br />";
									
										$query = "SELECT * FROM log Where status=2 "; 
									 
									$result = mysql_query($query) or die(mysql_error());

									
									while($row = mysql_fetch_array($result))
									{
									
											// Querying and finding the Student's Name
											$query = "SELECT * FROM users Where UserID =".$row['studentid']; 
											$stuname = mysql_query($query) ;
											$info = mysql_fetch_array( $stuname ); 
											
											// Querying and finding the Instructors Name
											$query1 = "SELECT * FROM users Where UserID=".$row['insid']; 
											$stuname1 = mysql_query($query1) ;
											$info1 = mysql_fetch_array( $stuname1); 
										
											echo '<tr>'	;
											echo " <td>". $row['id'] ."</td>";
											echo " <td>". $info['name'] ."</td>";
											
											echo " <td>". $row['time'] ."</td>";
											echo " <td>". $row['date'] ."</td>";	
											echo " <td>". $row['facility']   ."</td>";
											echo " <td>". $info1['name']   ."</td>";
											echo " <td> <a id='addsesrep' class=' ".$row['id'] ."' href=''>Add Session details</a></td>";
											
											echo "</tr>"	;
										
										
									}
			}

			public function stu_pen_tab()	// Loading Student Pending tab 
			{
		
						echo "<p><b>Pending Sessions History</b></p></br>";
									$query = "SELECT * FROM log Where  `status`=1 AND `studentid`=".$_SESSION['id'] ; 
						
						$result = mysql_query($query) or die(mysql_error());
						
						while($row = mysql_fetch_array($result))
									{
									
											$query = "SELECT * FROM users Where UserID =".$row['studentid']; 
											
											$stuname = mysql_query($query) ;
											$info = mysql_fetch_array( $stuname ); 
											
											
										echo '<tr>'	;
										echo " <td>". $row['id'] ."</td>";
										echo " <td>". $info['name'] ."</td>";
										echo " <td>". $row['req_date']   ."</td>";
										echo " <td>". $row['facility']   ."</td>";
										echo " <td>". $row['date'] ."</td>";
										echo " <td>". $row['time'] ."</td>";	
										echo "</tr>"	;
										
									}
			}
			
			public function stu_pre_tab()	// Loading Student Previous tab 
			{
			
					echo "<p><b>Previous Sessions History</b></p>";
									echo "<br />";
									
										$query = "SELECT * FROM log Where  `status`=0 AND `studentid`=".$_SESSION['id'] ; 
									 
									$result = mysql_query($query) or die(mysql_error());

									
									while($row = mysql_fetch_array($result))
									{
											$query = "SELECT * FROM users Where UserID =".$row['studentid']; 
											
											$stuname = mysql_query($query) ;
											$info = mysql_fetch_array( $stuname ); 
											
											$query1 = "SELECT * FROM users Where UserID =".$row['insid']; 
											
											$stuname1 = mysql_query($query1) ;
											$info1 = mysql_fetch_array( $stuname1 ); 
										
										echo '<tr>'	;
										echo " <td>". $row['id'] ."</td>";
										echo " <td>". $info['name'] ."</td>";
										
										echo " <td>". $row['time'] ."</td>";
										echo " <td>". $row['date'] ."</td>";	
										echo " <td>". $row['facility']   ."</td>";
										echo " <td>". $info1['name']   ."</td>";
										//echo ' <td> <a id="selector2" class="'.$row['id'].'" href="#">View Report</a> </td> ';
										echo '<td>  <a href="#" class='.$row['id'].' id="popreport" >View Report</a> </td>' ;

										echo "</tr>"	;
										
										
									}			
			
			}
			
			public function stu_app_tab()	// Loading Student Approved tab 
			{
							echo "<p><b>Approved Sessions </b></p>";
									echo "<br />";
									
										$query = "SELECT * FROM log Where  `status`=2 AND `studentid` =".$_SESSION['id'] ; 
									 
									$result = mysql_query($query) or die(mysql_error());

									
									while($row = mysql_fetch_array($result))
									{
											$query = "SELECT * FROM users Where UserID =".$row['studentid']; 
											
											$stuname = mysql_query($query) ;
											$info = mysql_fetch_array( $stuname ); 
											
											$query1 = "SELECT * FROM users Where UserID=".$row['insid']; 
											
											$stuname1 = mysql_query($query1) ;
											$info1 = mysql_fetch_array( $stuname1 ); 
										
										echo '<tr>'	;
										echo " <td>". $row['id'] ."</td>";
										echo " <td>". $info['name'] ."</td>";
										
										echo " <td>". $row['time'] ."</td>";
										echo " <td>". $row['date'] ."</td>";	
										echo " <td>". $row['facility']   ."</td>";
										echo " <td>". $info1['name']   ."</td>";
										
										echo "</tr>"	;
										
										
									}
			}

	}
	
	?>