$(document).ready(function() {       
    $('#groupText').click(function() {
        var num = $( '.group' ).length;
        var newNum = new Number( $('#groupText').attr('value') );
        newNum = Math.round(newNum);    // If a non-whole number was entered, round       
  
		// If adding to the form
        if ( num < newNum ) {
            var i = num + 1;
            // If the new number is greater, add form elements
            while (i <= newNum ){                   
		var insertHtml = '<h6><a href="#"> Group ' + newNum + '</a> </h3>' +
			'<div id="groups-'+newNum+'" class="group">' +
			'<ul id="g' + newNum + '" class="dragging dropping">' + 
                                '<li class="placeholder"> Drag names here </li>' +
                         '</ul>'+
	                 '</div>';

		// Add the new tab
		$('.groups').append(insertHtml);
		// Make the new table droppable
		makeDrop('#groups-'+newNum);
		// Recreate the accordion with the new group
		$('#groups').accordion('destroy').accordion();
               i++;
            }
        }
		else if ( num > newNum ) {
			var num = $( '.group' ).length;
			// add the stuff from the old list to the roster
			$('#g' + num + ' li' ).appendTo('#rosterList');
			$('#groups-'+num).remove();
			$('#groups h6:last-child').remove();
			$('#groups').accordion('destroy').accordion();
		}
   });        
});   
function detach(){
    lay  = document.getElementById('rosterSource');
    left = getXCoord(lay);
    top  = getYCoord(lay);
    lay.style.position = 'absolute';
    lay.style.top      = top;
    lay.style.left     = left;
    getFloatLayer('rosterSource').initialize();
    alignFloatLayers();
}

function makeDrop (id) {
$(id + " ul").droppable({
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
					
	}
});
}
