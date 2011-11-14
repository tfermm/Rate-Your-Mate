function sliderSynch (sliderNumb, ui)
{
  //console.log(sliderNumb);
  var nextSlider = 0;
	var totalSum = getSliderTotal();
	var sliderEval = "#slider" + sliderNumb;
	var currentSliderValue = ui.value;
	var previousSliderValue = old_pos[sliderNumb];
	
	var nextSliderValue = 0;
	var posVar;
   
	if (currentSliderValue > previousSliderValue)
	{
	// next slider needs to go down
    nextSlider = getNextSlider(sliderNumb, true);
    pos[nextSlider] = pos[nextSlider]-1;
    
    //$('.sliders').each(function(k) {
     //     $("#slider" +k).slider( "value", pos[k]);
      //  });
  }
	else if (currentSliderValue < previousSliderValue)
	{
    nextSlider = getNextSlider(sliderNumb, false);
    pos[nextSlider] =  pos[nextSlider]+1;
     //console.log("zach likes monkeys");
	   //next slider needs to go right
	  // 
    //$("#slider1").slider("value", 1); 
  }
  //console.log("previousSliderValue " + previousSliderValue);
}

function getSliderTotal() {
  var totalSum = 0;
	$('.sliders').each(function(index) {
			totalSum += $(this).slider( "option", "value" );	
	});
	return totalSum;
}

function getNextSlider(sliderNumb, addition_bool)
{
  if (sliderNumb == (groupSize - 1))
	{
	   //last slider 
     nextSlider = 0;
  }
  else
  {
    // normal case
     nextSlider = (sliderNumb + 1);
  }
  
  if((addition_bool && pos[nextSlider]==1) || ( pos[nextSlider]==maxPoints ) )
  {
    // recursion, case that the slider is all the way gone.
    // need a different case when they are maxed (or perhaps handle differntly for addition?subtraction!
    return getNextSlider(nextSlider, addition_bool);
  }
  
  return nextSlider;
}


function createSliders(num_groups, max_num) {

  $('.sliders').each(function(i) {
    $("#slider" +i).slider({
      value: pos[i],
      slide: function (e, ui){

        // clone the pos array so that we have it's original values available
        old_pos = pos.slice(0);
        pos[i] = ui.value;
        sliderSynch(i, ui);
        
        $('.sliders').each(function(k) {
          $("#slider" +k).slider( "value", pos[k]);
        });
                
        pc.setValues(pos);
        
      },
      min: 1,
      max: (max_num - (num_groups - 1))
      
    })
  });
  
}
