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
            $table->Bigincrements('campaign_id');
            $table->string('campaign_name',255);
            $table->string('campaign_logo',255)->nullable();
            $table->string('time_zone',45)->default('UTC');
            $table->string('language_name' ,100)->default('en')->comment('full name of language maximum 20 characters. Verify if any language has count characters greater than 20 limit.');
            $table->string('language_code',20)->comment('like ‘en’ for English');
//            $table->string('location_name')->comment('Full name of location including state, province, country and area etc.');
            $table->string('location_name')->comment('Full name of location including state, province, country and area etc.');
            $table->integer('location_code');
           $table->string('country_iso_code',5)->comment('3 characters country code');
            $table->string('url',255);
            $table->time('rank_check_due_time')->comment('This time is as per GMT');
            $table->timestamps();
            $table->integer('user_account_id');
            $table->integer('user_id');
            $table->tinyInteger('rank_check_frequncy')->comment('will be used in future if needed')->default('0');
            $table->tinyInteger('status')->default(1);


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
