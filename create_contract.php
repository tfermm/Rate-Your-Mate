
<html>


<div id="head">

<head>

<title>Rate Your Mate</title>

</head>


</div>

<h2>Create Contract</h2>
	

<div id="menu">

<?php include ("includes/menu.php"); ?>

</div>


<div id="content">

<p>Project I.D.</p>

<select>
  <option value="prj">Project ID</option>
  
</select>

<br/>

<p> How many behaviors will your contract contain? </p>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {

$('#btnAdd').click(function() {

var num = $('.clonedInput').length; // how many "duplicatable" input fields we currently have

var newNum = new Number(num + 1); // the numeric ID of the new input field being added

$('#groupText').attr('value', newNum);

// create the new element via clone(), and manipulate it's ID using newNum value

var newElem = $('#input' + num).clone().attr('id', 'input' + newNum);

// manipulate the name/id values of the input inside the new element

newElem.children(':first').attr('id', 'name' + newNum).attr('name', 'name' + newNum);

// insert the new element after the last "duplicatable" input field

$('#input' + num).after(newElem);

// enable the "remove" button

$('#btnDel').attr('disabled','');

// business rule: you can only add 5 names

if (newNum == 20 )

$('#btnAdd').attr('disabled','disabled');

});

$('#btnDel').click(function() {

var num = $('.clonedInput').length; // how many "duplicatable" input fields we currently have

$('#input' + num).remove(); // remove the last element

$('#groupText').attr('value', num-1);

// enable the "add" button

$('#btnAdd').attr('disabled','');

// if only one element remains, disable the "remove" button

if (num-1 == 1)

$('#btnDel').attr('disabled','disabled');

});

$('#groupText').change(function() {

var num = $( '.clonedInput' ).length;

var newNum = new Number( $('#groupText').attr('value') );

$i = num+1;

// If the new number is greater, add form elements

while ($i < newNum ){

// create the new element via clone(), and manipulate it's ID using newNum value

var newElem = $('#input' + num).clone().attr('id', 'input' + i);

// manipulate the name/id values of the input inside the new element

newElem.children(':first').attr('id', 'name' + i).attr('name', 'name' + i);

// insert the new element after the last "duplicatable" input field

$('#input' + num).after(newElem);

}

});

});
</script>
</head>


<div id="content">

Number of Behaviors:
<?php // Have a spinner that will increment, passes the max/min value in with it, so can resuse the JS for mulitple spinners ?>
<table cellpadding="0" cellspacing="0" border="0">

<tr>
<td rowspan="2"><input type="text" id="groupText" name="numGroups" value="1" style="width:50px;height:23px;font-weight:bold;" onchange="checkGroupValue();"/></td>
<td><input type="button" id="btnAdd" value=" /\ " onclick="incrementSpinNum(20)" style="font-size:7px;margin:0;padding:0;width:20px;height:13px;" ></td>
</tr>
<tr>
<td><input type="button" id="btnDel" value=" \/ " onclick="decrementSpinNum(1)" style="font-size:7px;margin:0;padding:0;width:20px;height:12px;" ></td>
</tr>
</table>

Behavior: <input type="text" name="behavior" /> <br />

<input type="submit" value='Submit Contract'/>

</div>

</html>