
<?php

/**
 * @Author Pasindu De Silav
 * @license  GNU Affero General Public License http://www.gnu.org/licenses/ 
 *
 * 
 *		This will popup and process the add new session
 * 	
 */
 include "base.php";
include "header.php"; 


if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{
?>	
<style>
 #msgbox{
 z-index: 9002;
background-color:#000;
border-color:#000;
color:#fff;
height:30px;
margin-bottom:8px;

}
</style>
<script>


	function postses() {

			if($("#dis").val()!=""  && $("#date").val()!="" && $("#time").val()!="" && $("#facility").val()!=""	)	{
		 

				$.post('addsession.php',{

							
	   			dis:$("#dis").val(),
	   			date:$("#date").val(),
	   			time:$("#time").val(),
	   			facility:$("#facility").val()
				
				},

					function(response){

						if(response == 2){
								$("#msgbox #msg").html("Request was not successfull");
								$("#msgbox").slideDown("normal");
						}else{
								$("#msgbox #msg").html("You have requested a session");
								
								$("#msgbox").slideDown("normal");
							
								
						
						}

					}
				);
				
				return false;
		}
		else
   		{
   			$("#msgbox #msg").html("   Enter all fields ");
   			$("#msgbox").slideDown("normal");
   			return false;
   		}

	}

</script>
<div id="msgbox" class="alert alert-info" style="cursor: pointer; " ><a style="text-align:left;"  id="msgbox">X   </a><span id="msg"></span></div>

<script>
	$(document).ready(function() {
			$("#msgbox").hide();
			
			
      	 $("#msgbox").click(function(){
				$("#msgbox").slideUp("normal");
		});
   });
</script>
<form>
<table border="0" cellspacing="2" cellpadding="0">

<tr>
<td align="left"><label for="id">Description </label></td>
<td><input name="dis" id="dis "maxlength="" type="text"></td>
</tr>

<tr>
<td  align="left"><label for="id">Date For Training </label></td>
<td><input name="date" id="date" maxlength="" type="text" </td>
</tr>

<tr>
<td  align="left"><label for="id">Time in zulu time </label></td>
<td><input name="time" id="time" maxlength="" type="text" ></td>
</tr>

<tr>
<td align="left"><label for="name">Facility  </label></td>
<td><input name="facility" id="facility" maxlength="" type="text" ></td>
</tr>

<tr>
<td colspan="2" align="center"><input name="" onclick="postses()" style=" width:100px; margin-top:10px; " value="Request Session"></td>
</tr>

</table>
</form>

<?php
}
?>