<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users';

    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable()->default(null);
            $table->string('password');
            $table->rememberToken();
            $table->integer('phone');
            $table->enum('type', ["admin", "applicant", "other"]);
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('mname')->nullable();
            $table->string('sname')->nullable();

            $table->unique(["email"], 'users_email_unique');
            $table->nullableTimestamps();
        });

        DB::table('users')->insert([
            "fname" => "root",
            "mname" => "super",
            "lname" => "user",
            "sname" => "user",
            "phone" => "0783191832",
            "email" => "admin@admin.com",
            "password" => bcrypt("Ttr@2022"),
            "type" => "admin",
        ]);
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
