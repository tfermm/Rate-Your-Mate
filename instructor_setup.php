<?php include ("includes/check_authorization.php"); 
error_reporting(-1);
?>
<html>
<head>
	<title> Instructor Setup </title>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script src="js/behavior.js"> </script>

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
			<?php // Have a spinner that will increment, passes the max/min value in with it, so can resuse the JS for mulitple spinners ?>
			<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td rowspan="2"><input  type="text" id="groupText" name="numGroups" value="1" <?php //style="width:50px;height:23px;font-weight:bold;" ?> /></td>
					<td><input type="button" id="btnAdd" value=" /\ " style="font-size:7px;margin:0;padding:0;width:20px;height:13px;" ></td>
				</tr>
				<tr>
					<td><input type="button" id="btnDel" value=" \/ " style="font-size:7px;margin:0;padding:0;width:20px;height:12px;" /></td>
				</tr>
			</table>

			<form id="createGroups">
				<div id="input1" class="clonedInput">
					Group: <input type="text" name="group1" id="group1" />
				</div>
				
				<div>

				</div>
			</form>
			
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


