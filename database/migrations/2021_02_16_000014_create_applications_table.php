<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'applications';

    /**
     * Run the migrations.
     * @table applications
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('job_post_id');
            $table->enum('status', ["selected", "rejected", "reserved"])->nullable();
            $table->unsignedBigInteger('application_document_id');

            $table->index(["user_id"], 'fk_application_users1_idx');

            $table->index(["job_post_id"],'fk_application_jobposts1_idx');
            $table->index(["application_document_id"],'fk_application_applicationdocuments1_idx');
            $table->nullableTimestamps();


            $table->foreign('user_id', 'fk_application_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('job_post_id','fk_application_jobposts1_idx')
                ->references('id')->on('job_posts')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->foreign('application_document_id','fk_application_applicationdocument1_idx')
                ->references('id')->on('application_documents')
                ->onDelete('no action')
                ->onUpdate('no action');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
