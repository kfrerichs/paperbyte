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
  $('.navbar-toggler').on('click', function(e){
    if($("#navbarSupportedContent1").is($(".collapse.show"))){
      $("#navbarSupportedContent1").collapse('hide');
      console.log('hide');
      e.stopPropagation();
    }
    else{
      $("#navbarSupportedContent1").collapse('show');
      console.log('show');
    }
  });
});

//--------Bonuspoints /character/abilities-------
// *** add class "selected" to all points that are lower than the clicked one and remove class
// *** of those that are higher than the clicked one, and save pointnumber to hidden input
function getNumber(points,name, bonus1, bonus2){
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
    // *** change displayed sum
    $($element).parents('td').siblings('.abilitysum').text(points+bonus1+bonus2);
  }
//--------Dice /play-----------
// *** An unmodified D10 is only one throw of a 10 sided dice. 
// *** Open up happens as long as a 10 is thrown and added to each other. 1 is a fail throw.
function throwDice(){
  // *** only throw dice, if an ability or rune is selected, or the checkbox is checked.
  if(selectedRune == true || selectedAbility == true || woAbility == true){
    var unmodified = throw_D10() + 1;
    var open = unmodified;
    if (open <= 1)
    {
      open = 1;
      $('.patzer').text('PATZER!');
    }
    else if (open >= 10)
    {
      open += throw_D10_open_up();
      $('.patzer').text('Open End!');
    }
    else{
      $('.patzer').text('');
    }
    // *** if the throw isn't unmodified show the result of the open_up as dice else show unmodified.
    // *** if the throw is without an ability show dice as overall result.
    // *** if the throw is open and with an ability sum up the ability-base-value, the ability-bonus,
    // *** possible inventory bonus and the dice as overall result.
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
    // *** get costs of runes to use, and subtract the value from the mp of the character, when dice is thrown
    costs = $('#runeCosts').val();
    var getMp = $('#mp').val();
    if(costs != 0){
      $('#mp').val(getMp-costs);
      $('#pointForm').submit();
    }
  }
  else{
    // *** show user that he needs to choose an ability
    $('.patzer').text('Bitte wähle eine Fertigkeit oder Rune aus.');
  }
}

function throw_D10(){
  // *** throw dice -> random number out of 10
  return Math.floor(Math.random() * 10); 
}
  
function throw_D10_open_up()
{
  // *** add value to dice as long as it got a 10
  var value = this.throw_D10();
  var result = value;
  while (value >= 10)
  {
    value = this.throw_D10();
    result += value;
  }
  return result;
}
function changeDice(){
  // *** checkbox on view, if player wants to throw an unmodified dice
  if($('#withoutOpen').prop('checked')){
    openDice = false;
  }else{
    openDice = true;
  }
}
//---------MP and HP /play-----------
// *** onClick on regenerate in view
function regenerate(){
  // *** set hp and mp input value to max to regenerate the character and submit to db
  var maxHP = $('#max_hp').val();
  var maxMP = $('#max_mp').val();
  $('#hp').val(maxHP);
  $('#mp').val(maxMP);
  $('#pointForm').submit();
}
// *** onClick on save in view
function savePoints(){
  // *** save changed hp and mp and submit to db
  // *** hp and mp can't be higher than the max-value
  var maxHP = parseInt($('#max_hp').val());
  var maxMP = parseInt($('#max_mp').val());
  var hp = parseInt($('#hp').val());
  var mp = parseInt($('#mp').val())
  if(hp <= maxHP && mp <= maxMP){
    $('#pointForm').submit();
    
  }else{
    $('#hp').val(maxHP);
    $('#mp').val(maxMP);
    $('#pointForm').submit();
  }
}
//---------Ability select: /play---------
// *** onClick on ability in view
// *** parameters to get variables/data of db
function saveAbility(name, base1, base2, bonus, id){
  var base= base1 + base2;
  abilitybase = base;
  abilitybonus = bonus;
  // *** remove previous saved data and selectedBox-Class from all elements and reset dice
  $('.ability').removeClass('selectedBox');
  $('.rune').removeClass('selectedBox');
  $('.showRune').hide();
  $('#play_inventory').hide();
  $('#play_modulo').hide();
  $('#play_dice').text('');
  $('#play_result').text('');
  // *** select clicked box based on ability name and uncheck "without Ability" checkbox
  var element = '#playAbility-'+name;
  $(element).addClass('selectedBox');
  $('.abilityresult').show();
  $('#withoutAbility').prop('checked',false);
  woAbility= false;
  // *** show ability-values like base, bonus and name to let the user see how his result is put together
  $('#play_ability').text($(element).text());
  $('#play_base').text(base);
  $('#play_bonus').text(bonus);
  // *** get inventar-item that has special modulo for an ability if existing
  var invName = '.inName-'+id;
  var invMod = '.inModulo-'+id;
  if($(invName).text()){
    $('#play_inventory').show().text($(invName).text() + ':');
    $('#play_modulo').show().text($(invMod).text());
    inventorybonus = parseInt($(invMod).text());
  }
  selectedAbility = true;
  // *** set runeCosts to 0, if ability is changed to other than runes_use, so the player doesn't
  // *** loose magicpoints on thrown dice, even if he can't do magic.
  if(element != '#playAbility-runes_use'){
    $('#runeCosts').val(0);
    selectedRune = false;
  }
}
// *** delete selected class and all data when "without Ability" gets checked. Also allow the use of dice
// *** without choosing an ability
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
//---------Runes select: /play--------------
// *** onClick on rune in view
function saveRune(name, bonus, attr1,attr2){
  // *** remove select and data of previous selected elements
  $('.showRune').hide();
  $('.rune').removeClass('selectedBox');
  $('.effects-head').removeClass('selectedBox');
  $('.chosen').text('');
  $('#play_dice').text('');
  $('#play_result').text('');
  selectedRune = false;
  // *** select ability "runes_use" when rune is chosen
  saveAbility('runes_use',attr1,attr2,bonus);
  var element = '#playRune-'+name;
  $(element).addClass('selectedBox');
  var rune = '.'+name
  $(rune).css("display","flex");
  // *** disable rune level, that is to high for the character (dependent on ability-bonus on runes_use)
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
// *** onClick on level in view
function chooseLevel(level, name, price){
  $('.effects-head').removeClass('selectedBox');
  // *** write data like name of level, rune and the mp-price into a string and save price into hidden
  // *** input to subtract it from the mp on dice throw.
  if($('.effects-head') != $('.disabled')){
    selectedRune = true;
    var rune_name = $(this).parents('.effects').siblings('h3').text();
    var element = '.'+level
    $(element).children('.effects-head').addClass('selectedBox');
    $('.chosen').text(name+' wurde gewählt. '+rune_name+' für '+price+' MP durch Würfeln wirken!');
    $('#runeCosts').val(price);
  }
  else{
    // fallback
    $('.chosen').text('Du kannst diese Wirkung noch nicht verwenden');
    
  }
}

