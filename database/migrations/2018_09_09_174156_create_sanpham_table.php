<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     * php artisan migrate
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('id');//primarykey
            $table->string("id_san_pham",10);
            $table->string('ten san pham', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * php artisan migrate:rollback
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
