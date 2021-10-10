<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GTLRaceDB extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $date = new DateTime();
        $unixTimeStamp = $date->getTimestamp();

        /*
        |--------------------------------------------------------------------------
        | Meetings
        |--------------------------------------------------------------------------
        */
        Schema::connection('mysql')->create('tbm_meetings', function (Blueprint $table) {
            $table->id();
            $table->string('external_id', 99);
            $table->String('name');

            $table->engine = 'InnoDB';
        });

        DB::connection('mysql')->table('tbm_meetings')->insert([
            [
                'external_id' => '1',
                'name' => 'Sandown'
            ],
            [
                'external_id' => '2',
                'name' => 'Sandown2'
            ],
            [
                'external_id' => '3',
                'name' => 'Sandown3'
            ]
        ]);
        /*
        |--------------------------------------------------------------------------
        | Races
        |--------------------------------------------------------------------------
        */
        Schema::connection('mysql')->create('tbm_races', function (Blueprint $table) {
            $table->id();
            $table->string('external_id', 99);
            $table->String('name');
            $table->BigInteger('meeting_id')->unsigned();
            $table->foreign('meeting_id')->references('id')->on('tbm_meetings')->onDelete('cascade');
            $table->engine = 'InnoDB';
        });
        
        DB::connection('mysql')->table('tbm_races')->insert([
            [
                'external_id' => '1',
                'name' => 'Race1',
                'meeting_id' => 1
            ],
            [
                'external_id' => '2',
                'name' => 'Race2',
                'meeting_id' => 2
            ],
            [
                'external_id' => '3',
                'name' => 'Race3',
                'meeting_id' => 3
            ]
        ]);
        /*
        |--------------------------------------------------------------------------
        | Runners
        |--------------------------------------------------------------------------
        */
        Schema::connection('mysql')->create('tbm_runners', function (Blueprint $table) {
            $table->id();
            $table->string('external_id', 99);
            $table->String('runner_name');
            $table->String('age');
            $table->String('sex');
            $table->String('color');
            $table->BigInteger('race_id')->unsigned();
            $table->foreign('race_id')->references('id')->on('tbm_races')->onDelete('cascade');
            $table->engine = 'InnoDB';
        });
        
        DB::connection('mysql')->table('tbm_runners')->insert([
            [
                'external_id' => '1',
                'runner_name' => 'Runner1',
                'age' => '10',
                'sex' => 'M',
                'color' => 'Black',
                'race_id' => 1
            ],
            [
                'external_id' => '2',
                'runner_name' => 'Runner2',
                'age' => '10',
                'sex' => 'F',
                'color' => 'Black',
                'race_id' => 2
            ],
            [
                'external_id' => '3',
                'runner_name' => 'Runner3',
                'age' => '10',
                'sex' => 'M',
                'color' => 'Brown',
                'race_id' => 3
            ]
        ]);
        /*
        |--------------------------------------------------------------------------
        | Last Runs
        |--------------------------------------------------------------------------
        */
        Schema::connection('mysql')->create('tbm_form_last_runrs', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('runner_id')->unsigned();
            $table->BigInteger('run_date')->unsigned();
            $table->foreign('runner_id')->references('id')->on('tbm_runners')->onDelete('cascade');
        });

        DB::connection('mysql')->table('tbm_form_last_runrs')->insert([
            [
                'runner_id' => 1,
                'run_date' => $unixTimeStamp
            ],
            [
                'runner_id' => 2,
                'run_date' => $unixTimeStamp
            ],
            [
                'runner_id' => 3,
                'run_date' => $unixTimeStamp
            ]
        ]);
        /*
        |--------------------------------------------------------------------------
        | Form Data
        |--------------------------------------------------------------------------
        */
        Schema::connection('mysql')->create('tbm_form_data', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('runner_id')->unsigned();
            $table->String('place');
            $table->foreign('runner_id')->references('id')->on('tbm_runners')->onDelete('cascade');
        });

        DB::connection('mysql')->table('tbm_form_data')->insert([
            [
                'runner_id' => 1,
                'place' => '2'
            ],
            [
                'runner_id' => 2,
                'place' => '3'
            ],
            [
                'runner_id' => 3,
                'place' => '4'
            ]
        ]);

        
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql')->drop('tbm_meetings');
        Schema::connection('mysql')->drop('tbm_races');
        Schema::connection('mysql')->drop('tbm_runners');
        Schema::connection('mysql')->drop('tbm_form_last_runrs');
        Schema::connection('mysql')->drop('tbm_form_data');
    }
}
