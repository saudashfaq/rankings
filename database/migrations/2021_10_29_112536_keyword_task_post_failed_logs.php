<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KeywordTaskPostFailedLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //

        Schema::create('keyword_task_post_failed_logs',function (Blueprint $table){

            $table->id();
            $table->bigInteger('keyword_task_id')->nullable()->comment('This is keyword_tasks table unique id');
            $table->text('data')->nullable();
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
        //
    }
}
