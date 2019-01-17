<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIcommerceagreeIcommerceAgreeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icommerceagree__icommerceagree_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('icommerceagree_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['icommerceagree_id', 'locale']);
            $table->foreign('icommerceagree_id')->references('id')->on('icommerceagree__icommerceagrees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('icommerceagree__icommerceagree_translations', function (Blueprint $table) {
            $table->dropForeign(['icommerceagree_id']);
        });
        Schema::dropIfExists('icommerceagree__icommerceagree_translations');
    }
}
