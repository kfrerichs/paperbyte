<?php

//use App\User;

Route::get('/', function () {
    return redirect('home');
});

Route::group(['middleware' => ['auth']], function(){

    Route::get('/creategroup', 'HomeController@getCreateGroup'); 
    Route::get('/joingroup', 'HomeController@getJoinGroup');
    Route::post('/creategroup/join', 'HomeController@postCreateGroupJoin');
    Route::post('/creategroup/new', 'HomeController@postCreateGroupNew');

    Route::group(['middleware' => ['group']], function(){

        Route::resource('/home', 'ProtocolController', [
            'except' => ['create', 'show']
        ]);
        
        Route::resource('home/adventure', 'AdventureController',[
            'except' => ['create', 'show']
        ]);

        Route::get('/home/npcs', 'HomeController@getNpc');

        Route::get('/home/npcs/edit', 'HomeController@getNpcEdit');
        Route::post('/home/npcs/edit', 'HomeController@postNpcEdit');
        Route::get('/home/places', 'HomeController@getPlaces');
        Route::get('/home/places/edit', 'HomeController@getPlacesEdit'); 
        Route::post('/home/places/edit', 'HomeController@postPlacesEdit');

        Route::get('/character/name', 'CharacterController@getName');
        Route::post('/character/name', 'CharacterController@postName');

        Route::group(['middleware' => ['character']], function(){

            Route::get('/character', 'CharacterController@getOverview');
            Route::post('/character', 'CharacterController@postOverview');
            Route::get('/character/abilities', 'CharacterController@getAbilities');
            Route::post('/character/abilities', 'CharacterController@postAbilities');
            Route::get('/character/inventory', 'CharacterController@getInventory');
            Route::post('/character/inventory', 'CharacterController@postInventory');
            Route::get('/character/inventory/delete/{id?}', 'CharacterController@getDelete');

            Route::get('/group', 'GroupController@getOverview');
            Route::get('/group/detail/{id?}', 'GroupController@getDetail');

            Route::get('/play', 'PlayController@getPlay');
            Route::post('/play', 'PlayController@postPlay');
            Route::get('/play/master', 'PlayController@getPlayMaster');
            Route::post('/play/master', 'PlayController@postPlayMaster');
            Route::post('/play/master/points', 'PlayController@postPlayMasterPoints');
        });

        Route::get('/profile/password', 'ProfileController@getPass'); 
        Route::post('/profile/password', 'ProfileController@postPass')->name('changePassword');
        Route::get('/profile/name', 'ProfileController@getName');
        Route::post('/profile/name', 'ProfileController@postName');

        Route::get('/rules', 'RulesController@getIndex');
        Route::get('/rules/weapons', 'RulesController@getWeapons');
        Route::get('/rules/runes', 'RulesController@getRunes');
        Route::get('/rules/potions', 'RulesController@getPotions');
        Route::get('/rules/character_file', 'RulesController@getCharacterfile');
        Route::get('/rules/fail_table', 'RulesController@getFailtable');
        });
});

Auth::routes();
