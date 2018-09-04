var abilityname;
var abilitybase;
var abilitybonus;
var openDice = true;
var woAbility = false;

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
  if(openDice){
    $('#play_dice').text(open);
    if(woAbility){
      $('#play_result').text(open);
    }else{
      $('#play_result').text(abilitybase+abilitybonus+open);
    }
  }else{
    $('#play_dice').text(unmodified);
    if(woAbility){
      $('#play_result').text(unmodified);
    }else{
      $('#play_result').text(abilitybase+abilitybonus+unmodified);
    }
  }  

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
function saveAbility(name,base1, base2,bonus){
  var base= base1 + base2;
  abilitybase = base;
  abilitybonus = bonus;
  $('.ability').removeClass('selectedAbility');
  var element = '#playAbility-'+name;
  $(element).addClass('selectedAbility');
  $('.abilityresult').show();
  $('#withoutAbility').prop('checked',false);
  $('#play_ability').text($(element).text());
  $('#play_base').text(base);
  $('#play_bonus').text(bonus);
}

function deleteSelection(){
  if($('#withoutAbility').prop('checked')){
    $('.ability').removeClass('selectedAbility');
    $('.abilityresult').hide();
    woAbility = true;
  }else{
    woAbility = false;
    $('.abilityresult').show();
  }
}
function changeDice(){
  if($('#withoutOpen').prop('checked')){
    openDice = false;
  }else{
    openDice = true;
  }
}

$(document).ready(function() {
  $(".dropdown-toggle").dropdown();
});