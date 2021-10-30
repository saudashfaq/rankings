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
            $table->tinyInteger('google_organic')->nullable();
            $table->text('google_organic_stats')->nullable();
            $table->tinyInteger('google_organic_change');
            $table->tinyInteger('google_local');
            $table->text('google_local_stats');
            $table->tinyInteger('google_local_change');
            $table->tinyInteger('google_mobile');
            $table->text('google_mobile_stats');
            $table->tinyInteger('google_mobile_change');
            $table->tinyInteger('bing_organic');
            $table->text('bing_organic_stats');
            $table->tinyInteger('bing_organic_change');
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
        Schema::dropIfExists('keyword_rankings');
    }
}
