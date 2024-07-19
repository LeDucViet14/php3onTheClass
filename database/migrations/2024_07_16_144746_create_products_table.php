<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // php artisan migrate
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id'); // int && unsigned && primary key && AI
            $table->string('name', 20);
            $table->float('price', 10, 2)->default(800.02);
            $table->string('description',500)->nullable();
            $table->timestamps(); // created_at && updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // php artisan migrate:rollback || reset
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
