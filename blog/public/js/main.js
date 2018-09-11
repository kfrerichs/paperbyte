var abilityname;
var abilitybase = 0;
var abilitybonus = 0;
var inventorybonus = 0;
var openDice = true;
var woAbility = false;
var costs;
var selectedRune = false;
var selectedAbility = false;
//-------Dropdown Logout-------
$(document).ready(function() {
  $(".dropdown-toggle").dropdown();
});

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
  if(selectedRune == true || selectedAbility == true || woAbility == true){
    var unmodified = throw_W10() + 1;
    var open = unmodified;
    if (open <= 1)
    {
      open -= throw_W10_open_up();
      $('.patzer').text('PATZER!');
    }
    else if (open >= 10)
    {
      open += throw_W10_open_up();
      $('.patzer').text('Open End!');
    }
    else{
      $('.patzer').text('');
    }

    if(openDice){
      $('#play_dice').text(open);
      if(woAbility){
        $('#play_result').text(open);
      }else{
        $('#play_result').text(abilitybase+abilitybonus+inventorybonus+open);
      }
    }else{
      $('#play_dice').text(unmodified);
      if(woAbility){
        $('#play_result').text(unmodified);
      }else{
        $('#play_result').text(abilitybase+abilitybonus+inventorybonus+unmodified);
      }
    }
    costs = $('#runeCosts').val();
    var getMp = $('#mp').val();
    if(costs != 0){
      $('#mp').val(getMp-costs);
      $('#pointForm').submit();
    }
  }
  else{
    $('.patzer').text('Bitte wähle eine Fertigkeit oder Rune aus.');
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
function changeDice(){
  if($('#withoutOpen').prop('checked')){
    openDice = false;
  }else{
    openDice = true;
  }
}
//---------MP und TP /play-----------
function regenerate(){
  var maxHP = $('#max_hp').val();
  var maxMP = $('#max_mp').val();
  $('#hp').val(maxHP);
  $('#mp').val(maxMP);
  $('#pointForm').submit();
}
function savePoints(){
  $('#pointForm').submit();
}
//---------Fertigkeiten Auswahl: /play---------

function saveAbility(name, base1, base2, bonus, id){
  var base= base1 + base2;
  abilitybase = base;
  abilitybonus = bonus;
  $('.ability').removeClass('selectedBox');
  $('.rune').removeClass('selectedBox');
  $('.showRune').hide();
  $('#play_inventory').hide();
  $('#play_modulo').hide();
  var element = '#playAbility-'+name;
  $(element).addClass('selectedBox');
  $('.abilityresult').show();
  $('#withoutAbility').prop('checked',false);
  woAbility= false;
  $('#play_dice').text('');
  $('#play_result').text('');
  $('#play_ability').text($(element).text());
  $('#play_base').text(base);
  $('#play_bonus').text(bonus);
  var invName = '.inName-'+id;
  var invMod = '.inModulo-'+id;
  if($(invName).text()){
    $('#play_inventory').show().text($(invName).text() + ':');
    $('#play_modulo').show().text($(invMod).text());
    inventorybonus = parseInt($(invMod).text());
  }
  selectedAbility = true;
  if(element != '#playAbility-runes_use'){
    $('#runeCosts').val(0);
    selectedRune = false;
  }
}
function deleteSelection(){
  if($('#withoutAbility').prop('checked')){
    $('.ability').removeClass('selectedBox');
    $('.abilityresult').hide();
    $('#play_ability').text('');
    $('#play_base').text('');
    $('#play_bonus').text('');
    $('#runeCosts').val(0);
    $('#play_dice').text('');
    $('#play_result').text('');
    abilitybase = 0;
    abilitybonus = 0;
    woAbility = true;
    selectedAbility = false;
    selectedRune = false;
  }else{
    woAbility = false;
    $('.abilityresult').show();
    $('#play_dice').text('');
    $('#play_result').text('');
  }
}
//---------Runen Auswahl: /play--------------
function saveRune(name, bonus, attr1,attr2){
  $('.showRune').hide();
  $('.rune').removeClass('selectedBox');
  $('.effects-head').removeClass('selectedBox');
  $('.chosen').text('');
  $('#play_dice').text('');
  $('#play_result').text('');
  selectedRune = false;
  saveAbility('runes_use',attr1,attr2,bonus);
  var element = '#playRune-'+name;
  $(element).addClass('selectedBox');
  var rune = '.'+name
  $(rune).show();
  if(bonus < 12){
    $('.expert').children('.effects-head').addClass('disabled').attr('onClick','');
  }
  else if(bonus < 8){
    $('.adept').children('.effects-head').addClass('disabled').attr('onClick','');
    $('.expert').children('.effects-head').addClass('disabled').attr('onClick','');
  }
  if(bonus < 4){
    $('.novice').children('.effects-head').addClass('disabled').attr('onClick','');
    $('.adept').children('.effects-head').addClass('disabled').attr('onClick','');
    $('.expert').children('.effects-head').addClass('disabled').attr('onClick','');
    
  }
}
function chooseLevel(level, name, price){
  $('.effects-head').removeClass('selectedBox');
  if($('.effects-head') != $('.disabled')){
    selectedRune = true;
    var rune_name = $(this).parents('.effects').siblings('h3').text();
    var element = '.'+level
    $(element).children('.effects-head').addClass('selectedBox');
    $('.chosen').text(name+' wurde gewählt. '+rune_name+' für '+price+' MP durch Würfeln wirken!');
    $('#runeCosts').val(price);
  }
  else{
    $('.chosen').text('Du kannst diese Wirkung noch nicht verwenden');
    
  }
}

