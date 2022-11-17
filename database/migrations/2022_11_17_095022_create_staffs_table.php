<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->increments('id');
            $table->String("fname");
            $table->String("mname");
            $table->String("lname");
            $table->String("title");
            $table->boolean("is_director")->default(0);
            $table->text("image")->nullable();
            $table->text("description");
            $table->timestamps();
        });

        DB::table('staffs')->insert([
            [
                "fname"=> "Recruiting",
                "mname"=> "Manager",
                "lname"=> "Director",
                "title"=> "Recruiting Manager",
                "is_director"=> 1,
                "image" => "public/uploaded_img/qWSM4rpE5Eu2qLdVhS7WB6Hwb30zKNYTbrWVgobz.jpg",
                "description" => "Recruiting Manager",
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staffs');
    }
}
