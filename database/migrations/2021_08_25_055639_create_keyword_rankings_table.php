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
        Schema::create('keywordRankings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('keyword_id');
            $table->integer('user_account_id');
            $table->bigInteger('campaign_id');
            $table->date('rank_for_date')->nullable();
            $table->tinyInteger('google_organic')->nullable();
            $table->text('google_organic_stats')->nullable();
            $table->tinyInteger('google_organic_change')->nullable();
            $table->tinyInteger('google_local')->nullable();
            $table->text('google_local_stats')->nullable();
            $table->tinyInteger('google_local_change')->nullable();
            $table->tinyInteger('google_mobile')->nullable();
            $table->text('google_mobile_stats')->nullable();
            $table->tinyInteger('google_mobile_change')->nullable();
            $table->tinyInteger('bing_organic')->nullable();
            $table->text('bing_organic_stats')->nullable();
            $table->tinyInteger('bing_organic_change')->nullable();
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
        Schema::dropIfExists('keywordRankings');
    }
}
