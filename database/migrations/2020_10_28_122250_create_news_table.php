<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id')->lenght(11);
            $table->unsignedBigInteger('category_id')->lenght(11);
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('author_id')->lenght(11);
            $table->foreign('author_id')->references('id')->on('author')->onDelete('cascade')->onUpdate('cascade');
            $table->string('caption');
            $table->integer('h_view');
            $table->integer('c_view');
            $table->longText('text');
            $table->string('min_text');
            $table->string('image');
            $table->string('slug');
            $table->integer('reading_count')->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            //
        });
    }
}
