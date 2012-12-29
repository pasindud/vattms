<?php
/**
 * @Author Pasindu De Silav
 * @license  GNU Affero General Public License http://www.gnu.org/licenses/ 
 *
 * 
 *	This will load the relavent details to the dash according 
 *	To the level of the user
 * 	
 */
 
include 'myclass.php';
	$obj = new MyClass;  
	
	if($_SESSION['level']==1)
								{	
								
									echo '<div id="tabs-1"  style="background:#fff;">';
									echo "<br />";
										
									?>
									<table >
										<th>Session ID</th>
										<th>Name</th>
										<th>Date</th>
										<th>Time</th>
										<th>Facility</th>
										<th>Approve</th>
										
													<?php  $obj->ins_pen_tab();		//  All request sessions tab 	?>
									</table>
									</div>
									
									
									<div id="tabs-2">
									<br />
										<table>
											<th>Session ID</th>
											<th>Name</th>
											<th>Date</th>
											<th>Time</th>
											<th>Facility</th>
											<th>Instructor Name</th>
											<th>Instructor Report</th>
											
													<?php 	$obj->ins_pre_tab();  // All Previous tab	?>
											
										</table>
									</div>
									
									
									
									<div id="tabs-3">
									<br />
									
										<table>
											<th>Session ID</th>
											<th>Name</th>
											<th>Date</th>
											<th>Time</th>
											<th>Facility</th>
											<th>Instructor Name</th>
											<th>Add session report</th>
										
														<?php	$obj->ins_app_tab();	?>
										
										</table>
									</div>
									
									<div id="tabs-3">
									
									
									<?php
									echo '</div>';
									
								}
			else
								{	
								
									echo '<div id="tabs-1" >';
									echo "<br />";
										
									?>
									<table>
									<tr>
									<th>Session ID</th>
									<th>Requested date</th>
									<th>Student Name</th>
									<th>Facility</th>
									<th>Date</th>
									<th>Time</th>

									
									</tr>
									<?php  
											$obj->stu_pen_tab();		//  All request sessions tab
									?>
									</table>
									</div>
									
									
									<div id="tabs-2">
									<br />
									
									<table>
									<th>Session ID</th>
									<th>Name</th>
									<th>Date</th>
									<th>Time</th>
									<th>Facility</th>
									<th>Instructor Name</th>
									<th>Instructor Report</th>
									<?php
										$obj->stu_pre_tab();  // All Previous tab
									?>
									
									</table>
									</div>
									<div id="tabs-2">
									
									
									<div id="tabs-3">
									<br />
									
									<table>
									<th>Session ID</th>
									<th>Name</th>
									<th>Date</th>
									<th>Time</th>
									<th>Facility</th>
									<th>Instructor Name</th>
								
									<?php
									$obj->stu_app_tab();
									
									?>
									
									</table>
									</div>
									<div id="tabs-3">
									
									
									<?php
									echo '</div>';
									
								}
	?>