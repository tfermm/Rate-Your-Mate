<?php include ("includes/check_authorization.php"); 
error_reporting(-1);
?>
<html>
<head>
	<title> Instructor Setup </title>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script src="js/instructor_setup.js"> </script>

</head>
<body>
    <div id="header">
        <h1> Instructor Setup </h1>
    </div>

	<div id="menu">
		<?php include ("includes/menu.php"); ?>
	</div>

	<div id="content">
		<form id="instructor_setup" name="instructorsetup" 
		      action="instruct_submit.asp" method="post"  >
			Project I.D.: <input type="text" name="projectID" /> 	<br />
			Number of Groups: 
			
			<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td rowspan="2"><input  type="text" id="groupText" name="numGroups" value="1"  /></td>
					<td><input type="button" id="btnAdd" value=" /\ " 
						style="font-size:7px;margin:0;padding:0;width:20px;height:13px;"/ ></td>
				</tr>
				<tr>
					<td><input type="button" id="btnDel" value=" \/ " 
						style="font-size:7px;margin:0;padding:0;width:20px;height:12px;" /></td>
				</tr>
			</table>

			<div id="rosterSource" >
				<select name="roster" multiple="multiple">
				<?php
				foreach($_SESSION['roster'] as &$student ) {
					echo "<option value=".$student['screenname']." id=".$student['id'].">";
					echo $student['name']."</option>";
				}
				?>
				</select>
			</div>

			<div id="input1" class="clonedInput">
				
				<select name="group1" size="4" id="group1" multiple="multiple">
				</select>
				
				<?php //Group: <input type="text" name="group1" id="group1" /> ?>
			</div>
						
			<br />
			<p>Who creates the Contract? </p>
			<br />
			<input type="radio" name="creator" value="student" /> Student <br />
			<input type="radio" name="creator" value="faculty" /> Faculty <br />
			
			<p>Do you want to submit a grade for: </p>
			<input type="radio" name="gradeSubmit" value="1" /> Evaluatee Only	<br />
			<input type="radio" name="gradeSubmit" value="2" /> Evaluator Only	<br />
			<input type="radio" name="gradeSubmit" value="3" /> Both		<br />
			<input type="radio" name="gradeSubmit" value="4" /> None		<br />

			Number of Evaluations: <input type="text" name="numEval" />   <br />
			<input type="submit" value="Submit" />
		</form>
	</div>
</body>
 
</html>


