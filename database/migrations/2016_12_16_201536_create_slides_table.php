<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->boolean('published')->default(false);
			$table->text('content');
			$table->string('show_on_selected_days')->nullable();
			$table->string('background_image')->nullable();
			$table->string('background_color')->nullable();
                        $table->timestamp('date_from')->nullable();
                        $table->timestamp('date_to')->nullable();
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
        Schema::dropIfExists('slides');
    }
}
