//--------Bonuspunkte /character/abilities-------
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
    var $input = "#"+name;
    $($input).val(points);

  }
//--------Würfel /play-----------
function throwDice(){
  var unmodified = throw_W10() + 1;
  var open = unmodified;
  if (open <= 1)
  {
    open -= throw_W10_open_up();
  }
  if (open >= 10)
  {
    open += throw_W10_open_up();
  }
  $("#testDice").html(open); 
  $("#testDiceUnmodified").html(unmodified);
  
  var $abilitypointResult = $('#chosenAbility').val();
  $("#abilitypoint-result").html($abilitypointResult); 

  // if($('#withoutAbility').prop('checked')){
  //   $('#testDice').html(open); 
  //   $('#testDiceUnmodified').html(unmodified);
  // }
  
}
function throw_W10(){
  return Math.floor(Math.random() * 10); 
}
  
function throw_W10_open_up()
{
  var value = this.throw_W10();
  var result = value;
  while (value >= 10)
  {
    value = this.throw_W10();
    result += value;
  }
  return result;
}


//---------Fertigkeiten Auswahl: Spielseite----------
function saveAbility(name,count){
  $('.ability').removeClass('selectedAbility');
  var element = '#playAbility-'+name;
  $(element).addClass('selectedAbility');
  $('#chosenAbility').val(count);
  $('#withoutAbility').prop('checked',false);
}

function deleteSelection(){
  if($('#withoutAbility').prop('checked')){
    $('.ability').removeClass('selectedAbility');
    $('#chosenAbility').val('');
  }
}
function changeDice(){
  if($('#withoutOpen').prop('checked')){
    $('.dice.open').hide()
    $('.dice.modified').show()
  }else{
    $('.dice.modified').hide()
    $('.dice.open').show()
  }
}