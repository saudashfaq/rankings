<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeywordRankingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keyword_rankings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('keyword_id');
            $table->integer('user_account_id');
            $table->bigInteger('	campaign_id');
            $table->date('rank_for_date');
            $table->timestamps();
            $table->tinyInteger('google_organic');
            $table->tinyInteger('google_organic_change');
            $table->tinyInteger('google_local');
            $table->tinyInteger('google_local_change');
            $table->tinyInteger('google_mobile');
            $table->tinyInteger('google_mobile_change');
            $table->tinyInteger('bing_organic');
            $table->tinyInteger('bing_organic_chnage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keyword_rankings');
    }
}
