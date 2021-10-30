<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeywordTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keyword_tasks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('keyword_id');
            $table->string('task_id',255)->comment('this is task id that is received from DataForSeo')->nullable();
            $table->tinyInteger('serp_type')->comment('1=google-organic, 2=google-local, 3=google-mobile, 4=bing-organic');
            $table->text('data')->comment('data would be stored here as it is so that I can debug later if needed.')->nullable();
            $table->tinyInteger('status')->comment('1=post_task_reattempt, 2=awaiting for data, 3=get_task_reattempt, 4=data_received_awaiting_rank_update, 5=keyword_rank_updated');
            $table->timestamp('post_task_attempt_due_at')->comment('	This is time equals to created_at + 5 or post_task_attempt_due_at + 5 each attempt. If status is not updated to some other than “post_task_reattempt” then, postTask request will be made to set task again. Status column should have value of post_task_reattempt.')->nullable();
            $table->tinyInteger('post_task_attempts')->default(1)->comment('	3 attempts in total before aborting with each five minutes interval. At the end send email to the dev of it.');
            $table->timestamp('get_task_attempt_due_at')->nullable()->comment('This is time equals to created_at + 47minutes. If data is not received till this time then, getTask request will be made to fetch data for this task. Look for status as well, it should be awaiting data.');
            $table->tinyInteger('get_task_attempts')->default(0)->comment('total 3 attempts having five minutes interval between each attempt starting from the time get_task_attempt_due_at column value');
            $table->string('se',8)->comment('search engine here will “google” or ‘bing’');
            $table->string('se_type',10)->comment('organic or maps');
            $table->string('device',8)->nullable()->comment('null or mobile');
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
        Schema::dropIfExists('keyword_tasks');
    }
}
