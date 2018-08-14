<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnemiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enemies', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('hidden');
            $table->string('name')->unique();
            $table->string('gender');
            $table->integer('meetingpoint_id')->unsigned();
            $table->foreign('meetingpoint_id')->references('id')->on('places')->onDelete('cascade');
            $table->integer('job_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->integer('weapon_1_id')->unsigned();
            $table->foreign('weapon_1_id')->references('id')->on('weapons')->onDelete('cascade');
            $table->integer('weapon_2_id')->unsigned();
            $table->foreign('weapon_2_id')->references('id')->on('weapons')->onDelete('cascade');
            $table->integer('armour_id')->unsigned();
            $table->foreign('armour_id')->references('id')->on('armours')->onDelete('cascade');
            $table->integer('max_hp')->unsigned();
            $table->integer('hp')->unsigned();
            $table->integer('max_mp')->unsigned();
            $table->integer('mp')->unsigned();
            $table->integer('li');
            $table->integer('st');
            $table->integer('in');
            $table->integer('re');
            $table->integer('ge');
            $table->integer('lo');
            $table->integer('sd');
            $table->integer('ch');
            $table->integer('knowledge');
            $table->integer('stamina');
            $table->integer('observation');
            $table->integer('influence');
            $table->integer('disarm');
            $table->integer('ingeniosity');
            $table->integer('first_aid');
            $table->integer('traps');
            $table->integer('dexterity');
            $table->integer('poison');
            $table->integer('ambush');
            $table->integer('climbing');
            $table->integer('herbal');
            $table->integer('mythology');
            $table->integer('navigation');
            $table->integer('thresh');
            $table->integer('ride');
            $table->integer('religion');
            $table->integer('runes_write');
            $table->integer('runes_use');
            $table->integer('sail');
            $table->integer('sneak');
            $table->integer('lock_picking');
            $table->integer('smithing');
            $table->integer('swimming');
            $table->integer('language');
            $table->integer('traces');
            $table->integer('illusion');
            $table->integer('potions');
            $table->integer('hiding');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enemies',function(Blueprint $table){
            $table->dropForeign(['meetingpoint_id']);
            $table->dropForeign(['job_id']);
            $table->dropForeign(['weapon_1_id']);
            $table->dropForeign(['weapon_2_id']);
            $table->dropForeign(['armour_id']);
        });
        Schema::dropIfExists('enemies');
    }
}
