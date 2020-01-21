<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned()->index();
            $table->string('title')->nullable(false);
            $table->string('description')->nullable(false);
            $table->string('slug')->unique();
            $table->longText('content')->nullable(false);
            $table->longText('html_content')->nullable(false);
            $table->tinyInteger('state_id')->default(0);
            $table->integer('view_count')->unsigned()->default(0);
            $table->timestamps();
            $table->timestamp('published_at')->nullable()->index();
            $table->softDeletes();
            $table->bigInteger('created_by_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
