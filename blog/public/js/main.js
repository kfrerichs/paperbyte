  // Ratingcode von https://phppot.com/jquery/favorite-star-rating-with-jquery/
  // function abilitypoint(obj) {
  //   removeHighlight();		
  //   $('.abilitypoints-point').each(function(index) {
  //     $(this).addClass('highlight');
	// 	if(index == $(".abilitypoints-point").index(obj)) {
  //     return false;	
	// 	}
  //   });
  // }
  
  // function highlightPoint(obj,name) {
  //   removeHighlight(name);		
  //   $('"#'+name+'"').each(function(index) {
  //     $(this).addClass('highlight');
  //     if(index == $('"#'+name+'"').index(obj)) {
  //       return false;	
  //     }
  //   });
  // }
  // function removeHighlight(name) {
  //   $('"#'+name+'"').removeClass('selected');
  //   $('"#'+name+'"').removeClass('highlight');
  // }
  
  
  // function addRating(obj) {
  //   $('.abilitypoints-point').each(function(index) {
  //     $(this).addClass('selected');
  //     $('#rating').val((index+1));
  //     if(index == $(".abilitypoints-point").index(obj)) {
  //       return false;	
  //     }
  //   });
  // }

  // function resetRating() {
  //   if($("#rating").val()) {
  //     $('.abilitypoints-point').each(function(index) {
  //       $(this).addClass('selected');
  //       if((index+1) == $("#rating").val()) {
  //         return false;	
  //       }
  //     });
  //   }
  // }

  function getNumber(points,name){
    for(var i=1;i<=points;i++){
      var number = 1;
      if(i < 10){
        number = '0'+ i;
      }
      else{
        number = i;
      }
      var $element = '#'+name+'-'+number;
      $($element).addClass('selected');
    }
    for(var i=14;i>points;i--){
      var number = 14;
      if(i < 10){
        number = '0'+ i;
      }
      else{
        number = i;
      }
      var $element = '#'+name+'-'+number;
      $($element).removeClass('selected');
    }
    //$($element).toggleClass('selected');
    var $input = "#"+name;
    $($input).val(points);

  }