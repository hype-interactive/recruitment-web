<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service_name');
            $table->unsignedBigInteger('user_id');
            $table->string('message')->nullable();
            $table->timestamps();

            $table->index('user_id', 'fk_users_service_subscriptions_idx');

            $table->foreign('user_id', 'fk_users_service_subscriptions_idx')
                ->references('id')->on('users')
                ->onDelete('cascade')
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
        Schema::dropIfExists('service_subscriptions');
    }
}
