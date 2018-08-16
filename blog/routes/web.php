<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

// Auth::user()->authorizeRoles([‘manager’])
// Route::group(['middleware' => ['auth', 'role:admin|user']], function () {

Route::get('/creategroup', 'HomeController@getCreateGroup'); //Gruppe erstellen Seite 
Route::get('/joingroup', 'HomeController@getJoinGroup'); //Gruppe erstellen Seit
Route::post('/creategroup/join', 'HomeController@postCreateGroupJoin');
Route::post('/creategroup/new', 'HomeController@postCreateGroupNew');

Route::get('/home', 'HomeController@getProtocol'); //Protokollseite
Route::post('/home', 'HomeController@postProtocol'); //Protokollseite

Route::resource('protocol', 'ProtocolController');

Route::get('/home/adventure', 'HomeController@getAdventure'); //Abenteuerseite (nur für Meister sichtbar)
Route::post('/home/adventure', 'HomeController@postAdventure'); //Abenteuerseite (nur für Meister sichtbar)

Route::resource('adventure', 'AdventureController');


Route::get('/home/npcs', 'HomeController@getNpc'); //NPC Übersicht (nur von Meister bearbeitbar)
Route::get('/home/npcs/edit', 'HomeController@getNpcEdit'); //NPC bearbeiten (nur für Meister sichtbar)
Route::post('/home/npcs/edit', 'HomeController@postNpcEdit'); //NPC bearbeiten (nur für Meister sichtbar)
Route::get('/home/places', 'HomeController@getPlaces'); //Ort Übersicht (nur von Meister bearbeitbar)
Route::get('/home/places/edit', 'HomeController@getPlacesEdit'); //Ort Übersicht (nur von Meister bearbeitbar)
Route::post('/home/places/edit', 'HomeController@postPlacesEdit'); //Ort Übersicht (nur von Meister bearbeitbar)

Route::get('/character', 'CharacterController@getOverview'); //Charakterübersicht
Route::post('/character', 'CharacterController@postOverview'); //Charakterübersicht
Route::get('/character/new', 'CharacterController@getNew'); //Charakter Neu
Route::post('/character/new', 'CharacterController@postNew'); //Charakter Neu
Route::get('/character/abilities', 'CharacterController@getAbilities'); //Fertigkeiten Übersicht (Bearbeiten von Meister an und Abstellbar)
Route::post('/character/abilities', 'CharacterController@postAbilities'); //Fertigkeiten Übersicht (Bearbeiten von Meister an und Abstellbar)
Route::get('/character/inventory', 'CharacterController@getInventory'); //Inventar
Route::post('/character/inventory', 'CharacterController@postInventory'); //Inventar
Route::post('/character/inventory/delete/{id?}', 'CharacterController@getDelete'); //Inventar

Route::get('/group', 'GroupController@getOverview'); //Gruppenübersicht
Route::get('/group/detail', 'GroupController@getDetail'); //Gruppenmitglied Detailansicht

Route::get('/play', 'PlayController@getPlay'); //Spielseite (nur für Spieler sichtbar)
Route::post('/play', 'PlayController@postPlay'); //Spielseite (nur für Spieler sichtbar)
Route::get('/play/master', 'PlayController@getPlayMaster'); //Spielseite (nur für Meister sichtbar)
Route::post('/play/master', 'PlayController@postPlayMaster'); //Spielseite (nur für Meister sichtbar)

Route::get('/profile/password', 'ProfileController@getPass'); //Passwort ändern
Route::post('/profile/password', 'ProfileController@postPass'); //Passwort ändern
Route::get('/profile/name', 'ProfileController@getName'); //Name und Email ändern
Route::post('/profile/name', 'ProfileController@postName'); //Name und Email ändern

Route::get('/rules', 'RulesController@getIndex'); //Midgard Seite
Route::get('/rules/weapons', 'RulesController@getIndex'); //Waffen Seite
Route::get('/rules/runes', 'RulesController@getIndex'); //Runen Seite
Route::get('/rules/potions', 'RulesController@getIndex'); //Tränke Seite
Route::get('/rules/character_file', 'RulesController@getIndex'); //Charakterbogen Seite
Route::get('/rules/fail_table', 'RulesController@getIndex'); //Patzertabelle Seite





//pages visible for all
//pages visible for players
//pages visible for master

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
