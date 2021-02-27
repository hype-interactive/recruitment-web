<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPostsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'job_posts';

    /**
     * Run the migrations.
     * @table job_posts
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->dateTime('deadline')->nullable();
            $table->enum('type', ["Full time", "Part time"])->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('job_category_id');
            $table->unsignedBigInteger('region_id');

            $table->index(["job_category_id"],'fk_jobpost_jobcategories1_idx');
            $table->index(["region_id"],'fk_jobpost_regions1_idx');
            $table->nullableTimestamps();

            $table->foreign('job_category_id','fk_jobpost_jobcategories1_idx')
                ->references('id')->on('job_categories')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('region_id','fk_jobpost_regions1_idx')
                ->references('id')->on('regions')
                ->onDelete('no action')
                ->onDelete('no action');

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
