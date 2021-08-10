<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLattesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lattes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');  //userと紐付け
            $table->timestamps();
            $table->string('design'); //ラテデザインのタイトルを保存するカラム
            $table->string('draw'); //描き方を保存するカラム
            $table->string('text'); //フリーテキストを保存するカラム
            $table->string('image_path'); //画像or動画のパスを保存するカラム
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lattes');
    }
}
