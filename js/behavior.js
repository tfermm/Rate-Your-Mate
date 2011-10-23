

        $(document).ready(function() {
            $('#btnAdd').click(function() {
                var num     = $('.clonedInput').length; 			// how many "duplicatable" input fields we currently have
                var newNum  = new Number(num + 1);      	// the numeric ID of the new input field being added
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
                $('#input' + num).remove();     // remove the last element
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
				
				
				if ( num < newNum ) {
					var i = num;
					// If the new number is greater, add form elements
					while (i < newNum ){					
						// create the new element via clone(), and manipulate it's ID using newNum value
						var newElem = $('#input' + num).clone().attr('id', 'input' + i);
		 
						// manipulate the name/id values of the input inside the new element
						newElem.children(':first').attr('id', 'name' + i).attr('name', 'name' + i);
		 
						// insert the new element after the last "duplicatable" input field
						$('#input' + num).after(newElem);
						i++;
					}
				}
				else if ( num > newNum ) {
					var i = num;
					while ( i > newNum ) {
						var num = $('.clonedInput').length; 
						$('#input' + num).remove();
						$('#groupText').attr('value', num-1);
		 
						// enable the "add" button
						$('#btnAdd').attr('disabled','');
		 
						// if only one element remains, disable the "remove" button
						if (num-1 == 1)
							$('#btnDel').attr('disabled','disabled');
						i--;
					}
				}
			});        
        });
		
