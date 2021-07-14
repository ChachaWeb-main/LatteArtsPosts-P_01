<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLatteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('latte', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title'); //ラテデザインのタイトルを保存するカラム
            $table->string('body'); //描き方とフリーテキストを保存するカラム
            $table->string('image_path'); //画像のパスを保存するカラム
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
        Schema::dropIfExists('latte');
    }
}
