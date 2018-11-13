<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsFulltextSearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs_fulltext_search', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('id');
            $table->unsignedInteger('song_id');
            $table->longText('data_index');
        });

        Schema::table('users', function(Blueprint $table)
        {
            DB::statement('ALTER TABLE songs_fulltext_search ADD FULLTEXT search(data_index)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs_fulltext_search');
    }
}
