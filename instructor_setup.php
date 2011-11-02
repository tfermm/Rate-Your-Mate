<?php include ("includes/check_authorization.php"); 
error_reporting(-1);
?>
<html>
<head>
    <title> Instructor Setup </title>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js'></script>
    <script src="js/instructor_setup.js"> 	</script>
    <script src="js/float_layers.js"> 		</script>  
   
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
         Project I.D.: <input type="text" name="projectID" />    <br />
         Number of Groups: 
        
         
        <input  type="number" id="groupText" name="numGroups" value="2" size="4" min="0" />
         
        <div id="rosterSource" class="dropping" >
            <ul name="roster" id="rosterList" class="dragging dropping">
            <?php
	    foreach ( $_SESSION['roster'] as &$student ) 
              echo '<li id="'.$student['id'].'">'.$student['name'].'</li>';    
	    ?>      
            </ul>
        </div>
	<div id='groupsContainer'>
		
		
	<div id='groups' class='groups' style="font-size:85.5%; width:50%">
		<h6><a href="#"> Group 1 </a> </h3>
		<div id="groups-1" class="dropping group">
			<ul class="dragging dropping" id="g1">
				<li class='placeholder'> This is a place holder </li>
			</ul>
		</div>
		<h6><a href="#"> Group 2 </a> </h3>
		<div id="groups-2" class="dropping group">
			<ul class="dragging dropping" id="g2">
				<li class='placeholder'> This is a place holder </li>
			</ul>
		</div>
	</div>
		
	<div id="contractCreator" class="instruct_rb">
		<p>Who creates the Contract? </p>
		<input type="radio" name="creator" value="student" /> Student <br />
		<input type="radio" name="creator" value="faculty" /> Faculty <br />
	</div>
		
        <div id="submitType">
			<p>Do you want to submit a grade for: </p>
			<input type="radio" name="gradeSubmit" value="1" /> Evaluatee Only   <br />
			<input type="radio" name="gradeSubmit" value="2" /> Evaluator Only   <br />
			<input type="radio" name="gradeSubmit" value="3" /> Both      		  <br />
			<input type="radio" name="gradeSubmit" value="4" /> None             <br />
		</div>
         <input id="numEval" name="numeval" type="number" value="1" size="4" 
		title="Number of Evaluations"/>   <br />
         <input type="submit" value="Submit" />
      </form>
   </div>
</body>

<script type="text/javascript">
	$(function() {
		$( "#groups" ).accordion();
	});
	// Make all student names draggable
	 $(".dragging li").draggable({
		appendTo: "body",
		helper: "clone"
	});
	// Not working!!!
	$(".dropping ul").droppable({
		activeClass: "ui-state-highlight",
		hoverClass: "ui-state-hover",
		accept: ":not(.ui-sortable-helper)",
		drop: function(event,ui){
			// If the place holder is there, remove it	
			$(this).find( ".placeholder" ).remove();
			
			// Remove the element from everywhere else	
			var element = document.getElementById(ui.draggable.attr('id'))
			if (element != null)
				element.parentNode.removeChild(element);	
			// Add it in			
			$('<li id="' + ui.draggable.attr('id') +
				'" class="ui-draggable">' + ui.draggable.html()+"</li>").appendTo(this);
			// Make the new list object draggable
			$('#' + this.id + ' li').draggable({
				appendTo: "body",
				helper: "clone"
			});
			$("ul").each(
				function() {
					var elem = $(this);
					if (elem.children().length == 0) {
						$('<li class="placeholder"> This is a place holder </li>').appendTo(this);
					}
				}
			);			
		}
	});

</script>
</html>


