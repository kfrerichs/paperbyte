<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user');
            $table->string('name')->unique();
            $table->string('image')->nullable();
            $table->string('gender')->nullable();
            $table->string('hair')->nullable();
            $table->string('eyes')->nullable();
            $table->integer('size')->unsigned()->nullable();
            $table->integer('weight')->unsigned()->nullable();
            $table->integer('job_id')->unsigned()->nullable();
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade')->nullable();
            $table->integer('age')->unsigned()->nullable();
            $table->string('family')->nullable();
            $table->string('personality')->nullable();
            $table->string('looks')->nullable();
            $table->string('background')->nullable();
            $table->integer('weapon_1_id')->unsigned()->nullable();
            $table->foreign('weapon_1_id')->references('id')->on('weapons')->onDelete('cascade')->nullable();
            $table->integer('weapon_2_id')->unsigned()->nullable();
            $table->foreign('weapon_2_id')->references('id')->on('weapons')->onDelete('cascade')->nullable();
            $table->integer('armour_id')->unsigned()->nullable();
            $table->foreign('armour_id')->references('id')->on('armours')->onDelete('cascade')->nullable();
            $table->integer('max_hp')->unsigned()->default(0);
            $table->integer('hp')->unsigned()->default(0);
            $table->integer('max_mp')->unsigned()->default(0);
            $table->integer('mp')->unsigned()->default(0);
            $table->integer('li_rank')->default(0);
            $table->integer('li')->default(0);
            $table->integer('st_rank')->default(0);
            $table->integer('st')->default(0);
            $table->integer('in_rank')->default(0);
            $table->integer('in')->default(0);
            $table->integer('re_rank')->default(0);
            $table->integer('re')->default(0);
            $table->integer('ge_rank')->default(0);
            $table->integer('ge')->default(0);
            $table->integer('lo_rank')->default(0);
            $table->integer('lo')->default(0);
            $table->integer('sd_rank')->default(0);
            $table->integer('sd')->default(0);
            $table->integer('ch_rank')->default(0);
            $table->integer('ch')->default(0);
            $table->integer('knowledge')->default(0);
            $table->integer('stamina')->default(0);
            $table->integer('observation')->default(0);
            $table->integer('influence')->default(0);
            $table->integer('disarm')->default(0);
            $table->integer('ingeniosity')->default(0);
            $table->integer('first_aid')->default(0);
            $table->integer('traps')->default(0);
            $table->integer('dexterity')->default(0);
            $table->integer('poison')->default(0);
            $table->integer('ambush')->default(0);
            $table->integer('climbing')->default(0);
            $table->integer('herbal')->default(0);
            $table->integer('mythology')->default(0);
            $table->integer('navigation')->default(0);
            $table->integer('thresh')->default(0);
            $table->integer('ride')->default(0);
            $table->integer('religion')->default(0);
            $table->integer('runes_write')->default(0);
            $table->integer('runes_use')->default(0);
            $table->integer('sail')->default(0);
            $table->integer('sneak')->default(0);
            $table->integer('lock_picking')->default(0);
            $table->integer('smithing')->default(0);
            $table->integer('swimming')->default(0);
            $table->integer('language')->default(0);
            $table->integer('traces')->default(0);
            $table->integer('illusion')->default(0);
            $table->integer('potions')->default(0);
            $table->integer('entertainment')->default(0);
            $table->integer('hiding')->default(0);
            $table->boolean('death')->default(false);
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
        Schema::table('characters',function(Blueprint $table){
            $table->dropForeign(['job_id']);
            $table->dropForeign(['weapon_1_id']);
            $table->dropForeign(['weapon_2_id']);
            $table->dropForeign(['armour_id']);
        });
        Schema::dropIfExists('characters');
    }
}
