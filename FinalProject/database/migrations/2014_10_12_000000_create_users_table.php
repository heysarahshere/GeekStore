<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_id')->nullable(); //user shouldn't need these
            $table->integer('payment_id')->nullable();
            $table->string('username');
            $table->string('profile_image')->nullable();
            $table->string('email')->unique();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('billingFirstName')->nullable();
            $table->string('billingLastName')->nullable();
            $table->string('shipping_line1')->nullable();
            $table->string('shipping_line2')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_zip')->nullable();
            $table->string('shipping_state')->nullable();
            $table->string('billing_line1')->nullable();
            $table->string('billing_line2')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_zip')->nullable();
            $table->string('billing_state')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
