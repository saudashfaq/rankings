<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->integer('campaign_id');
            $table->string('campaign_name');
            $table->string('campaign_logo');
            $table->string('time_zone')->default('UTC');
            $table->string('language_name')->default('en')->comment('full name of language maximum 20 characters. Verify if any language has count characters greater than 20 limit.');
            $table->string('language_code')->comment('like ‘en’ for English');
            $table->integer('location_code');
            $table->string('location_name')->comment('Full name of location including state, province, country and area etc.');
            $table->string('country_iso_code')->comment('3 characters country code');
            $table->string('url');
            $table->time('rank_check_due_time')->comment('This time is as per GMT');
            $table->timestamps();
            $table->integer('user_account_id');
            $table->integer('user_id');
            $table->tinyInteger('rank_check_frequncy');
            $table->tinyInteger('status');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
}
